<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ExcelController
 * @package App\Http\Controllers\Admin
 */
class ExcelController extends Controller
{
    /**
     * @param Post $post
     */
    public function postExport(Post $post)
    {
        $data[] = ["编号", "标题", "内容", "用户编号", "状态", "创建时间", "更新时间"];
        $items = $post->get();
        foreach ($items as $key => $value) {
            $data[] = [
                $value->id,
                $value->title,
                $value->content,
                $value->user_id,
                $value->status,
                $value->created_at,
                $value->updated_at
            ];
        }
        \Excel::create(sha1(time() . rand(1000, 9999)), function($excel) use ($data){
            $excel->sheet("文章", function($sheet) use ($data){
                $sheet->rows($data);
            });
        })->export('xls');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postImport(Request $request)
    {
//        $path = $request->file("excel")->store('excel');
        $excel = $request->file('excel');
        $extension = $excel->getClientOriginalExtension();
        $path = $excel->storeAs("excel", md5(time()) . "." . $extension);
        $filePath = 'storage/' . $path;
//        asset('storage/' . $path);
        Excel::load($filePath, function ($reader) {
            $data = $reader->getSheet(0)->toArray();
            $items = [];
            foreach ($data as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $items[] = [
                    "id" => $value[0],
                    "title" => $value[1],
                    "content" => "$value[2]",
                    "user_id" => $value[3],
                    "status" => $value[4],
                    "created_at" => $value[5],
                    "updated_at" => $value[6]
                ];
            }
            Post::insert($items);
        });
        return redirect("/admin/posts");
    }
}
