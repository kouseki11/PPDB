<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Http::get('https://akmalweb.my.id/api/payment/')->json();

        return view('user.dashboard.payment',[
            'banks' => $banks,
            'title' => 'Payment',
            "active" => 'payment',
            'payment' => Payment::where('user_id', '=', Auth::user()->id)->first(),
            'user' => Payment::all(),
        ]);
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
    public function store(Request $request)
    {

        $request->validate([
             'bank' => 'required',
             'name' => 'required',
             'nominal' => 'required',
             'payment_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        $image = $request->file('payment_image');
        $imgName = time().rand().'.'.$image->extension();

        if(!file_exists(public_path('/images/payment_images'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/images/payment_images');

            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        }else {
            $uploaded = $image->getClientOriginalName();
        }

        //  if($image = $request->file('payment_image')) {
        //     if($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['payment_image'] = $request->file('payment_image')->store('payment_images');
        // }

        // $validatedData['user_id'] = auth()->user()->id;


        Payment::create([
            'bank' => $request->bank,
            'name' => $request->name,
            'nominal' => $request->nominal,
            'payment_image' => $uploaded,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/dashboard')->with('successUpdate', 'Berhasil Mengedit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'bank' => 'required',
            'name' => 'required',
            'nominal' => 'required',
            'payment_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

       $image = $request->file('payment_image');
       $imgName = time().rand().'.'.$image->extension();

       if(!file_exists(public_path('/images/payment_images'.$image->getClientOriginalName()))){
           $destinationPath = public_path('/images/payment_images');

           $image->move($destinationPath, $imgName);
           $uploaded = $imgName;
       }else {
           $uploaded = $image->getClientOriginalName();
       }

       //  if($image = $request->file('payment_image')) {
       //     if($request->oldImage) {
       //         Storage::delete($request->oldImage);
       //     }
       //     $validatedData['payment_image'] = $request->file('payment_image')->store('payment_images');
       // }

       // $validatedData['user_id'] = auth()->user()->id;


       Payment::where('id', $id)->update([
           'bank' => $request->bank,
           'name' => $request->name,
           'nominal' => $request->nominal,
           'payment_image' => $uploaded,
           'user_id' => Auth::user()->id,
           'status' => "Pending",
       ]);

       return redirect('/dashboard')->with('successUpdate', 'Berhasil Mengedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }


    public function validasi($id)
    {
        Payment::where('id', $id)->update(
            [
                'status' => 'Accepted',
            ]
        );
        return redirect()->back();
    }

    public function tolak($id)
    {
        Payment::where('id', $id)->update(
            [
                'status' => 'Rejected',
            ]
        );
        return redirect()->back();
    }

    public function buktiPembayaran($id)
    {
        return view('user.dashboard.buktiPembayaran', [
           'title' => 'Payment',
           "active" => 'payment',
           'payment' => Payment::where('id', $id)->first(),
        ]);
    }

    public function detailPendaftaran($id)
    {
        return view('user.dashboard.detailPendaftaran', [
           'title' => 'Payment',
           "active" => 'payment',
           'user' => User::where('id', $id)->first(),
        ]);
    }
    
}
