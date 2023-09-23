<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionSellLine;
use App\TransactionSellLinesPurchaseLines;
use App\Utils\TransactionUtil;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ResponseEvent;


class IdController extends Controller
{
    public function index(){
     
  
        $ok=Transaction::latest('id')->first();
        $id=$ok->id;
                
              
        $data = DB::table('transaction_sell_lines')
        ->join('products','products.id','=','transaction_sell_lines.product_id')
        ->join('transactions','transactions.id','=','transaction_sell_lines.transaction_id')
        ->join('contacts','contacts.id','=','transactions.contact_id')
        ->join('business_locations','business_locations.id','=','transactions.business_id')
        
        
        
        ->select('transaction_sell_lines.quantity','products.name as pro_name','transactions.invoice_no','transactions.transaction_date','contacts.name','transaction_sell_lines.created_at','business_locations.name as location_name')->where('transaction_sell_lines.transaction_id','=',$id)
            
                ->get();

                // dd($data);
                // die();
                return response($data);
        // $ok=TransactionSellLinesPurchaseLines::latest('id')->first();
        // $id=$ok->sell_line_id;
        
        // $tran=TransactionSellLine::find($id);
        
        // $aa=$tran->transaction_id;
        
        
        
              
        // $data=DB::table('transaction_sell_lines') 
        // ->join('transactions','transactions.id','=','transaction_sell_lines.transaction_id')
        // ->join('products','products.id','=','transaction_sell_lines.product_id')
        // ->select('transaction_sell_lines.quantity','transactions.invoice_no','transactions.id','products.name as pro_name')->where('transaction_sell_lines.transaction_id','=',$aa)->get();
        //         return response($data);
             
            }
}
