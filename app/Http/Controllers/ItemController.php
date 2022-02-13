<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreItemRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        $file = Storage::disk('test')->get('test3.jpg');
//        $file1 = Storage::disk('test')->path('test3.jpg');
//        dd(Image::make($file)->getRealpath());
//        $img = Image::make($file)->orientate()->resize(300, null, function ($constraint) {
//            $constraint->aspectRatio();
//        })->encode('jpg');
//        $img->save('3.jpg', 90 );
//        dd(1);
//        dd(Storage::disk('test')->put('new_test3.jpg', $img));

//        $hash = md5($img->__toString());
//        dd(Storage::disk('test')->putFile('111', $img));
//        $img->resize(300, 250);
//        dd(Storage::disk('test')->putFile('test_dir', $img->__toString()));
//        $img->save('public/large.jpg');
//        dd($img);
//        dd(Storage::disk('test')->get('test.jpg'));
//        $image = Image::make('https://znamporn.com/famos/eFFZBSkhNtG8S5Z_1623673746.jpg')->stream();
//        Storage::put('image_name.jpg', $image->getContents());
//        dd(1);
//        Storage::disks(['test', 'test2'])->put('avatars/1', 'test111');
//        Storage::disk('test2')->put('avatars/1', 'test222');
//        dd(1);
//        dd(Storage::path('example111.txt'));
//          dd(Storage::url('example111.txt'));
//        return Storage::download('example111.txt', '123', ['Content-Type' => 'zalupa', 'Cache-Control' => 'must-revalidate']);
//        dd(Storage::download('example111.txt'));
//        dd(Storage::get('example111.txt'));
        return view('items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $img = Image::make($request->file('file')->getRealpath());
        $img->orientate()->fit(300, 350, function ($constraint) {
            $constraint->upsize();
        })->encode(null, 30);
        $now = Carbon::now()->toDateTimeString();

        $hash = md5($img->__toString() . $now);
        $fileName = 'items/' . $hash . '.jpg';

        dump($fileName);
        dump(Storage::disk('test')->put($fileName, $img));
        dump(Storage::disk('test')->url($fileName));
        dd(Storage::disk('test')->path($fileName));
        dd(Storage::disk('test')->putFile($fileName));


        dd($now);
        dd($hash);
        dd(Storage::disk('test')->put('new_test3.jpg', $img));

        dd($img);
        $image = Image::make($request->file('file'))->fit(300)->save('test.jpg', 8);
//        dd($image);
//        $resize = Image::make($path)->fit(300);
//        $image->save('bar.jpg', 60);
//        dd(1);
        dd(Storage::disk('test')->put('pisture.jpg', $image));
//        dd(Storage::disk('test2')->put('pisture.jpg', $image->encode('jpg', 5)));

        $image->save('public/bar.jpg', 60);
        dd(1);
        dd($request->file('file')->extension());
//        dd(Storage::putFile('photos', $request->file('file'), 'public'));
        dd($request->file('file')->store(date('Y/m'), 'test'));
        dd(Storage::put('example111.txt', 'Contents'));

//        dd($request->file('file')->store('test', 'public'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
