<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;


class BasketController extends Controller
{

    function index()
    {
        $items = Basket::where(['user_id' => auth()->user()->id])->where(['is_buy' => 0])->with('products')->get();

        return view('layouts.checkout', compact('items'));
    }

    public function create(BasketRequest $request)
    {
        $validated = collect($request->validated());
        $arr = $validated->except('count')->toArray();
        $arr["is_buy"] = 0;
        $item = Basket::where($arr)->get();
        if ($item->count() > 0) {
            $item = $item->first();
            $item->increment('count', $validated->get('count'));
            $item->save();
        } else {
            Basket::create($request->validated());
        }

        sleep(1);
        return redirect(url()->previous());

    }

    public function editCount(Basket $basket, Request $request)
    {
        $basket->count = $request->get('count');
        $basket->save();
        return redirect()->back();
    }

    function destroy($items)
    {

        Basket::where(['id' => $items])->delete();
        sleep(1);
        return redirect(route('checkout.index'));
    }

    //Email, Название товара, Категория, Сумма, Количество

    public function history()
    {
        $items = Basket::groupBy('created_at')->get();

    }

    public function wordExport(Request $request)
    {

        $check = Basket::where(['user_id' => auth()->user()->id, 'is_buy' => 0])->get();

        foreach($check as $item) {
            $item->update(['is_buy' => 1]);
            $item->save();
        }

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $header = array('size' => 16, 'bold' => true);


// 2. Advanced table

        $section->addTextBreak(1);
        $section->addText(htmlspecialchars('Товарный чек'), $header);

        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '1266f1;', 'bgColor' => 'F93154', 'color' => 'ffffff');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Товарный чек', $styleTable, $styleFirstRow);
        $table = $section->addTable('Товарный чек');
        $table->addRow(900);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Код товара'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Наименование'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Количество'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Стоимость'), $fontStyle);
        foreach ($check as $item) {
            $table->addRow();
            $table->addCell(2000)->addText(htmlspecialchars($item->products->id));
            $table->addCell(2000)->addText(htmlspecialchars($item->products->name));
            $table->addCell(2000)->addText(htmlspecialchars($item->count));
            $table->addCell(2000)->addText(htmlspecialchars($item->products->price * $item->count));
        }
        $count = $check->sum(function($item) {
            return $item->products->price * $item->count;
        });
            $section->addText(htmlspecialchars('Итоговая стоимость: '.$count . ' руб.'), $header);



        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

        $fileName = time() . '.docx';

        $objWriter->save($fileName);

        $filePath = app()->basePath() . '\\public\\'. $fileName;

        Storage::disk('public')->put($fileName, file_get_contents($filePath));

        return Storage::disk('public')->download($fileName);

        sleep(1);

        return redirect()->back();


    }


}
