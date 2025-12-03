<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

trait ExcelExportTrait
{
    /**
     * ✅ دالة داخلية بتبني Export object من الهيدرز + الداتا
     * - ما بتستخدمهاش مباشرة في الكنترولر
     * - هي اللي بنبعتها لـ Excel::download أو Excel::store
     *
     * @param  array  $headers  عناوين الأعمدة في أول صف (Row 1)
     * @param  array  $rows  البيانات على شكل 2D array (كل صف = array)
     */
    protected function makeArrayExport(array $headers, array $rows)
    {
        // Anonymous class بتطبق FromArray + WithHeadings
        return new class($headers, $rows) implements FromArray, WithHeadings
        {
            protected array $headers;

            protected array $rows;

            public function __construct(array $headers, array $rows)
            {
                $this->headers = $headers;
                $this->rows = $rows;
            }

            // ترجع كل الصفوف (بدون الهيدرز)
            public function array(): array
            {
                return $this->rows;
            }

            // ترجع الهيدرز اللي في أول صف
            public function headings(): array
            {
                return $this->headers;
            }
        };
    }

    /**
     * 🧠 Helper داخلي:
     * يحوّل Query (Eloquent أو Query Builder) إلى 2D array جاهزة للإكسل
     *
     * - $columns: أسماء الأعمدة اللي عايزها وبنفس الترتيب
     *   مثال: ['id', 'name', 'email']
     */
    protected function queryToArray(EloquentBuilder|QueryBuilder $query, array $columns = []): array
    {
        return $query->get()->map(function ($row) use ($columns) {
            // لو محدد أعمدة معينة
            if (! empty($columns)) {
                $item = [];

                foreach ($columns as $col) {
                    // data_get تسمح نجيب nested values زي relation.name
                    $item[] = data_get($row, $col);
                }

                return $item;
            }

            // لو مش محدد أعمدة، هنستخدم toArray ونحوّل للقيم بس
            if (is_object($row) && method_exists($row, 'toArray')) {
                return array_values($row->toArray());
            }

            return array_values((array) $row);
        })->toArray();
    }

    /**
     * 📥 1) Download من Array (مش من Query)
     *
     * تستخدمها لو أنت مجهّز الداتا بنفسك كـ array جاهز:
     *
     * $headers = ['ID', 'Name', 'Email'];
     * $rows = [
     *     [1, 'Hossam', 'hossam@example.com'],
     *     [2, 'Ali',    'ali@example.com'],
     * ];
     *
     * return $this->downloadExcelFromArray('users-array.xlsx', $headers, $rows);
     *
     * @param  string  $fileName  اسم الملف اللي هينزل (مثال: users.xlsx)
     * @param  array  $headers  عناوين الأعمدة
     * @param  array  $rows  الداتا 2D array
     */
    public function downloadExcelFromArray(string $fileName, array $headers, array $rows)
    {
        $export = $this->makeArrayExport($headers, $rows);

        return Excel::download($export, $fileName);
    }

    /**
     * 💾 2) تخزين Excel من Array في storage/app/public/{folder}/{fileName}
     *
     * تستخدمها لو عايز تحفظ الملف في السيرفر وترجع لك URL:
     *
     * $url = $this->saveExcelFromArray(
     *     'exports/users',           // مكان التخزين داخل public disk
     *     'users-array.xlsx',        // اسم الملف
     *     $headers,
     *     $rows
     * );
     *
     * @param  string  $folder  مسار المجلد داخل Disk 'public' (بدون storage/) مثال: reports/users
     * @param  string  $fileName  اسم الملف (مثال: users.xlsx)
     * @param  array  $headers  عناوين الأعمدة
     * @param  array  $rows  البيانات 2D array
     * @return string URL للملف (مثال: /storage/reports/users/users.xlsx)
     */
    public function saveExcelFromArray(string $folder, string $fileName, array $headers, array $rows): string
    {
        $export = $this->makeArrayExport($headers, $rows);

        // نبني المسار داخل ال disk
        $path = trim($folder, '/').'/'.$fileName;

        // نخزن على public disk (لازم php artisan storage:link)
        Excel::store($export, $path, 'public');

        // نرجع URL عام للملف
        return Storage::disk('public')->url($path);
    }

    /**
     * 📥 3) Download من Query مباشرة
     *
     * تستخدمها لو عندك Query (Eloquent أو DB::table)
     * وما تحبش تعمّل map بنفسك.
     *
     * مثال:
     * $headers = ['ID', 'Name', 'Email'];
     * $columns = ['id', 'name', 'email'];
     * $query   = User::query()->select($columns);
     *
     * return $this->downloadExcelFromQuery(
     *     'users-from-query.xlsx',
     *     $headers,
     *     $query,
     *     $columns
     * );
     *
     * @param  string  $fileName  اسم الملف اللي هينزل
     * @param  array  $headers  عناوين الأعمدة في أول صف
     * @param  array  $columns  أسماء الأعمدة اللي هتتسحب من الـ query وبنفس ترتيب headers (أو حسب ما تحب)
     */
    public function downloadExcelFromQuery(
        string $fileName,
        array $headers,
        EloquentBuilder|QueryBuilder $query,
        array $columns = []
    ) {
        $rows = $this->queryToArray($query, $columns);

        return $this->downloadExcelFromArray($fileName, $headers, $rows);
    }

    /**
     * 💾 4) تخزين Excel من Query في السيرفر
     *
     * تستخدمها لو عايز تبني الملف من Query وتخزنه في مجلد معين داخل public disk:
     *
     * مثال:
     * $headers = ['ID', 'Name', 'Email'];
     * $columns = ['id', 'name', 'email'];
     * $query   = User::query()->select($columns);
     *
     * $url = $this->saveExcelFromQuery(
     *     'exports/users',           // مكان التخزين داخل public disk
     *     'users-from-query.xlsx',   // اسم الملف
     *     $headers,
     *     $query,
     *     $columns
     * );
     *
     * @param  string  $folder  مسار المجلد داخل Disk 'public' (مثال: exports/users)
     * @param  string  $fileName  اسم الملف (مثال: users.xlsx)
     * @param  array  $headers  عناوين الأعمدة
     * @param  array  $columns  الأعمدة اللي هنسحبها من الـ query
     * @return string URL للملف المخزون
     */
    public function saveExcelFromQuery(
        string $folder,
        string $fileName,
        array $headers,
        EloquentBuilder|QueryBuilder $query,
        array $columns = []
    ): string {
        $rows = $this->queryToArray($query, $columns);

        return $this->saveExcelFromArray($folder, $fileName, $headers, $rows);
    }
}

// usage

// in controller

// <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Traits\ExcelExportTrait;

// class UserReportController extends Controller
// {
//     use ExcelExportTrait;

//     /**
//      * 📥 مثال 1: Download من Array
//      * بنجيب الداتا ونحوّلها 2D array بنفسنا وبعدين ننزل الملف
//      */
//     public function downloadUsersFromArray()
//     {
//         // عناوين الأعمدة اللي هتظهر في أول صف في الإكسل
//         $headers = ['ID', 'Name', 'Email'];

//         // بنحوّل الـ Collection لـ 2D array (كل صف = [id, name, email])
//         $rows = User::select('id', 'name', 'email')
//             ->get()
//             ->map(fn ($user) => [
//                 $user->id,
//                 $user->name,
//                 $user->email,
//             ])
//             ->toArray();

//         // تحميل الملف مباشرة
//         return $this->downloadExcelFromArray('users-array.xlsx', $headers, $rows);
//     }

//     /**
//      * 💾 مثال 2: تخزين من Array في السيرفر
//      * بنجهّز الداتا كـ Array وبعدين نخزنها في مجلد معيّن
//      */
//     public function saveUsersFromArray()
//     {
//         $headers = ['ID', 'Name', 'Email'];

//         $rows = User::select('id', 'name', 'email')
//             ->get()
//             ->map(fn ($user) => [
//                 $user->id,
//                 $user->name,
//                 $user->email,
//             ])
//             ->toArray();

//         // تخزين الملف في مجلد exports/users داخل public disk
//         $url = $this->saveExcelFromArray(
//             'exports/users',        // مكان التخزين داخل storage/app/public
//             'users-array.xlsx',     // اسم الملف
//             $headers,
//             $rows
//         );

//         return response()->json([
//             'message' => 'Excel file (from array) saved successfully',
//             'url'     => $url, // مثال: /storage/exports/users/users-array.xlsx
//         ]);
//     }

//     /**
//      * 📥 مثال 3: Download من Query مباشرة
//      * بنبعت الـ Query + أسماء الأعمدة فقط، والـ trait يعمل الباقي
//      */
//     public function downloadUsersFromQuery()
//     {
//         $headers = ['ID', 'Name', 'Email'];       // عناوين الإكسل
//         $columns = ['id', 'name', 'email'];       // الأعمدة اللي من الجدول

//         // Query تقدر تضيف عليها where / orderBy / joins براحتك
//         $query = User::query()->select($columns);

//         return $this->downloadExcelFromQuery(
//             'users-from-query.xlsx',   // اسم الملف
//             $headers,
//             $query,
//             $columns
//         );
//     }

//     /**
//      * 💾 مثال 4: تخزين من Query في السيرفر
//      * يبني الداتا من Query ويخزن الملف في مكان مخصص ويرجع URL
//      */
//     public function saveUsersFromQuery()
//     {
//         $headers = ['ID', 'Name', 'Email'];
//         $columns = ['id', 'name', 'email'];

//         $query = User::query()->select($columns)
//             ->where('active', 1)       // مثال فلترة
//             ->orderByDesc('id');       // مثال ترتيب

//         $url = $this->saveExcelFromQuery(
//             'exports/active-users',    // مكان التخزين داخل public disk
//             'active-users.xlsx',       // اسم الملف
//             $headers,
//             $query,
//             $columns
//         );

//         return response()->json([
//             'message' => 'Excel file (from query) saved successfully',
//             'url'     => $url,
//         ]);
//     }
// }

// in routes

// Route::get('/excel/users/download-array',  [UserReportController::class, 'downloadUsersFromArray']);
// Route::get('/excel/users/save-array',      [UserReportController::class, 'saveUsersFromArray']);

// Route::get('/excel/users/download-query',  [UserReportController::class, 'downloadUsersFromQuery']);
// Route::get('/excel/users/save-query',      [UserReportController::class, 'saveUsersFromQuery']);
