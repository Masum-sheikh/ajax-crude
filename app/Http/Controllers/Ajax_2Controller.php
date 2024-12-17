<?php

namespace App\Http\Controllers;
use App\Models\Ajax;
use Illuminate\Http\Request;

class Ajax_2Controller extends Controller
{
    //
    public function index_2(){
        // $item = Ajax::all();
        $item = Ajax::paginate(5);
        return view('ajax_2.index_2',compact('item'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Ajax::create($input);
        return response()->json(['success' => 'Item added successfully!']);

    }
   public function edit($id){
    $item = Ajax::find($id);

    return response()->json([
       'item' => $item,
   ]);
   }
   public function update(Request $request, $id){
    $item = Ajax::find($id);
    $input = $request->all();
    if ($image = $request->file('image')) {
        if (file_exists(public_path('images/' . $item->image))) {
            unlink(public_path('images/' . $item->image));
        }
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    }
    $item->update($input);
    return response()->json(['success' => 'Item added successfully!']);
   }
   public function delete($id){
    $item = Ajax::find($id);
    if (file_exists(public_path('images/' . $item->image))) {
        unlink(public_path('images/' . $item->image));
    }
    $item->delete();
    return response()->json(['success' => 'Item deleted successfully!']);
   }
}
