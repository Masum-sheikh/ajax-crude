<?php

namespace App\Http\Controllers;
use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriRequest;
use App\Models\Categori;
class CategoriController extends Controller
{
    //
    public function index(){
        $catagoris = DB::table('categoris')->get();
        return view('ajax.index',compact('catagoris'));
    }
    //
    public function edite($id){
     $item = Categori::find($id);

     return response()->json([
        'item' => $item,
    ]);

    }
    public function store(CategoriRequest $request){

        if($request->image){
            $image = $request->image;
            $imagename = rand().'.'. $image->getClientOriginalName();
            $image->move(public_path('images'), $imagename);
            $imageurl = 'images/'.$imagename;
          }
          $item =New Categori;
          $item->name =$request->name;
          $item->price =$request->price;
          $item->image =$imagename;
          $item->save();
          return response()->json(['success' => 'Data inserted successfully']);
    }
    public function update(Request $request,$id){
        $item = Categori::find($id);

        // নতুন ইমেজ আপলোড করলে
        if ($request->hasFile('e_image')) {
            // পুরোনো ইমেজ ডিলিট

            $item = Categori::FindOrFail($id);
            $oldImage = public_path('images/' . $item->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // if (File::exists(public_path($item->image))) {
            //     unlink(public_path($item->image));
            // }

            // নতুন ইমেজ আপলোড করা
            $image = $request->file('e_image');
            $imagename = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagename);
            $item->image =  $imagename;
        }
        $item->name = $request->e_name;
        $item->price = $request->e_price;
        $item->save();
    }
    public function delete($id){

        $item = DB::table('categoris')->where('id', $id)->first();

        if ($item && $item->image) {

            $imagePath = public_path('images/' . $item->image); // ইমেজের পাথ ধরে নিচ্ছি 'images' ফোল্ডারে আছে

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        DB::delete('DELETE FROM categoris WHERE id= ?',[$id]);

    }
}
