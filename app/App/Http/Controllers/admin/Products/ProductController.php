<?php

namespace App\Http\Controllers\Admin\Products;
use App\Models\Products\Products;
use App\Http\Controllers\Admin\Products\Interfaces\IProductDataProvider;
use App\Http\Controllers\Admin\Products\Service\ProductServiceContainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Domain\Admin\Models\SchoolClass;
use Illuminate\Support\Facades\Auth;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\Admin\Models\School;
use Domain\Kladr\Models\Kladr;

class ProductController extends Controller {

    /*
    ЗАКАЗЧИКИ ГАНДОНЫ И ПИДОРАСЫ!!!!!
    ГОРЕТЬ В АДУ И НИЧЕГО У НИХ НЕ БУДЕТ!!!!

    БЕГИ, это КИДАЛЫ!

    *//*
       @var IProductDataProvider
      
    private IProductDataProvider $productDataProvider;

    public function __construct() {

        $this->productDataProvider = ProductServiceContainer::factory();

    }*/
    public function get_sum() {
        $sum = 1;
         
        return $sum;
    }
    public function index()
    {
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        //dd ($School);
        //$ExternalOrgunit->all()->first();
        $products = new Products;

        // dd($products->select('name')->get());
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        // dd($dil);

        return view('admin.products.index', ['products' => products::all()->first()->paginate(25)], compact('School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'stu'))->withClasses($classes);

        //return view('admin.products.index', compact('products'));
    }

   /* public function create(Request $request)
    {
        return view('employer.project.edit') ;
    }
*/
        
       /* foreach($products as $item) {
        if ($item->name == null ) {
        
        if (  $item->scul) 
         
            foreach (json_decode($item->scul) as $sc) 
            {
            foreach($classes->first()->where('school_id', $sc)->get() as $sc2)

            {$dil->push($sc2->number) }
            } 
        else  
            if  ( $item->sity)
            foreach (json_decode($item->sity) as $sc3)
            
            {
            foreach($School  as $cit )
            {
            if   ($cit->local == $sc3) 
            {
            foreach($classes->first()->where('school_id', $cit->id)->get() as $sc2) 
            
            {$dil->push($sc2->number)} 
            }
            } 
            }  
        }

        if ($item->scul == null and $item->sity == null )
        if (strpos($item->loc, ','))
        foreach (json_decode($item->loc) as $sc4)
          
         foreach($title->first()->where('socr',  'г')->orWhere('socr',  'п')->get() as $cit2)
         if ( substr($cit2->code, 0, 2)   ==   substr($sc4, 0, 2)  )
         foreach($School  as $cit )
         if   ($cit->local == $cit2->code) 
         foreach($classes->first()->where('school_id', $cit->id)->get() as $sc2){$dil->push($sc2->number)} 
         endforeach ; 
         endif 
         endforeach   
         endif 
         endforeach 
        endforeach
        
        
        else   
        
        foreach($School  as $cit )
         if   ( substr($cit->local, 0, 2) ==  substr(str_replace(['"', '[', ']'], "", $item->loc), 0, 2)) 
         foreach($classes->first()->where('school_id', $cit->id)->get() as $sc0) <a  {{$dil->push($sc0->number)}} > </a> 
         endforeach  
         endif 
        endforeach
        
         
          


        endif     
        endif

        



        if (strpos($item->name, ',')) 
        foreach (json_decode($item->name) as $sc)
        
        if (count(json_decode($item->name)) === count($dil->push($classes->first()->where('id', $sc)->value('number'))->collect()))
          
        
        endif ; 
        endforeach ;

        
          
        endif
        }

        dd($dol);*/
    public function del($id)
    {
        $products =  products::find($id);
        $products->delete();
        return redirect()->route('products.index');
    }
    public function edit_id($id)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        
        //$dil =  products::cursor()->remember();

        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        $product = products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов


        if ($product === null) {
            return response()->json(
                [
                    'message' => 'Проект не найден.'
                ], 404);
        }
        

        return view('admin.products.edit', ['product' => products::all()], compact('School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'stu', 'classes')) ->withProduct($product);
    }

    public function edit($id , Request $request)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        
        //$dil =  products::cursor()->remember();

        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        $product = products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов


        if ($product === null) {
            return response()->json(
                [
                    'message' => 'Проект не найден.'
                ], 404);
        }
        

        return view('admin.products.edit', ['product' => products::all()], compact('School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'stu', 'classes')) ->withProduct($product);
    }
    public function edit_loc($id)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        
        //$dil =  products::cursor()->remember();

        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        $product = products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        


        if ($product === null) {
            return response()->json(
                [
                    'message' => 'Проект не найден.'
                ], 404);
        }
        

        return view('admin.products.create.edit_loc', ['product' => products::all()], compact('School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'stu', 'classes')) ->withProduct($product);
    }
    public function edit_schul2($id)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        
        //$dil =  products::cursor()->remember();

        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products = products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        


        if ($products === null) {
            return response()->json(
                [
                    'message' => 'Проект не найден.'
                ], 404);
        }
        

        return view('admin.products.create.edit_schul',  compact('products','School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'city', 'classes')) ->withProduct($products);
    }
    public function edit_class2($id)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();
        
        //$dil =  products::cursor()->remember();

        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products = products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        


        if ($products === null) {
            return response()->json(
                [
                    'message' => 'Проект не найден.'
                ], 404);
        }
        

        return view('admin.products.create.edit_class',  compact('products','School', 'ExternalOrgunit', 'title', 'dil', 'dol', 'city', 'classes')) ->withProduct($products);
    }
    public function edit_sity(int $id, Request $request)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get(); 
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products =  products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        
        if ($request->input('loc')) {
            $products->loc = $request->input('loc');
            $products->name = $request->input('name');
            $products->sity = $request->input('sity');
            $products->scul = $request->input('scul');
        } 
        
        $products->save();
        if ($products === false) {
            return print_r($products) ;
        }
        
        //$product = $products;
        //return redirect()->route('products.index') ;
        //dd($products);
        return view('admin.products.create.edit_sity',  compact('products', 'School', 'ExternalOrgunit', 'city', 'dil', 'dol', 'stu', 'classes')) ->withProduct($products);
    }
    public function edit_schul(int $id, Request $request)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get(); 
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products =  products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        
        if ($request->input('sity')) {
            $products->sity = $request->input('sity');
        } 
        /*  
        $products->name = $request->input('name');
        $products->sity = $request->input('sity');
        $products->scul = $request->input('scul'); */
        $products->save();
        if ($products === false) {
            return print_r($products) ;
        }
        
        //$product = $products;
        //return redirect()->route('products.index') ;
        //dd($products);
        return view('admin.products.create.edit_schul',  compact('products', 'School', 'ExternalOrgunit', 'city', 'dil', 'dol', 'stu', 'classes')) ->withProduct($products);
    }
    public function edit_class(int $id, Request $request)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get(); 
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products =  products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        
        if ($request->input('scul')) {
            $products->scul = $request->input('scul');
            $products->name = $request->input('name');
        } 
        /*  
           */
        $products->save();
        if ($products === false) {
            return print_r($products) ;
        }
        
        //$product = $products;
        //return redirect()->route('products.index') ;
        //dd($products);
        return view('admin.products.create.edit_class',  compact('products', 'School', 'ExternalOrgunit', 'city', 'dil', 'dol', 'stu', 'classes')) ->withProduct($products);
    }
    public function edit_class_up(int $id, Request $request)
    {
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get(); 
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products =  products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        
        if ($request->input('name')) {
            $products->name = $request->input('name');
        } 
         
        $products->save();
        if ($products === false) {
            return print_r($products) ;
        }
        $product = $products;
        //$product = $products;
        //return redirect()->route('products.index') ;
        //dd($products);
        return view('admin.products.edit',  compact('product', 'School', 'ExternalOrgunit', 'city', 'dil', 'dol', 'title', 'classes')) ->withProduct($product);
    }
    public function update(int $id, Request $request)
    {
         
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get(); 
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $title = new Kladr;
        $School = $School->inRandomOrder()->get();
        $products =  products::find($id);
        $dil = collect(); //школы
        $dol = collect(); //цифры классов
        $stu = collect(); //id классов
        if ($request->input('org')) {
            $products->org = $request->input('org');
        }
        if ($request->input('napr')) {
            $products->napr = $request->input('napr');
        }
        if ($request->input('potr')) {
            $products->potr = $request->input('potr');
        }
        if ($request->input('god')) {
            $products->god = $request->input('god');
        }
         
        /*$products->loc = $request->input('loc'); 
        $products->name = $request->input('name');
        $products->sity = $request->input('sity');
        $products->scul = $request->input('scul'); */
        $products->save();
        if ($products === false) {
            return print_r($products) ;
        }
        $product = $products;
        return redirect()->route('products.index') ;

        
    }

    public function store(Request $request)
    {
        
 // add to base
        $products = new products();
        $products->id = $request->input('id');
        $products->name = $request->input('name');
        $products->org = $request->input('org');
        $products->napr = $request->input('napr');
        $products->potr = $request->input('potr');
        $products->god = $request->input('god');
        $products->loc = $request->input('loc');
        //if ($request->input('sity')) $products->sity = $request->input('sity'); else $products->sity = 0;
        //$products->sity = $request->input('sity');
        //if ($request->input('scul')) $products->scul = $request->input('scul'); else $products->scul = 0;
        //$products->scul = $request->input('scul');
        if ($request->input('sity')) 
        {
            $newsel = ['array'];
            $newsel = $request->input(['sity']);
            $newselthis = '';
            for($a = 0; $a<count($newsel); $a++) {
            $newselthis .= $newsel[$a].'#';
            }
            $products->sity = $newselthis; 
        }else  $products->sity = 9;
        
        if ($request->input('scul')) 
        {
            $newsel = ['array'];
            $newsel = $request->input(['scul']);
            $newselthis = '';
            for($a = 0; $a<count($newsel); $a++) {
            $newselthis .= $newsel[$a].'#';
            }
            $products->scul = $newselthis; 
        }else  $products->scul = 9;
 
        //dd(explode("#", $products->scul, -1));
        $products->save();
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function storeLoc(Request $request)
    {
        $products = new products();
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $city = new Kladr;
       
        $city = $city->inRandomOrder() ; 
        //$cities = Kladr::filterByParent('code')    ->get()    ->groupBy(function($item) {         return mb_substr($item->name, 0, 2);     });
         
        
        
        return view('admin.products.create.location', compact('products', 'city', 'ExternalOrgunit' )) 
            ->with('success', 'Product created successfully.');

    }

    public function storeScul( Request $request)
    { 
        $products =  new products();
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        

        if ($products === null) {
            return response()->json(
                [
                    'message' => 'Product not found.'
                ], 404);
        }
        //$products->loc = ['array'];
        
        $products->id = $request->input('id'); 
        $products->org = $request->input('org');
        $products->napr = $request->input('napr');
        $products->potr = $request->input('potr');
        $products->god = $request->input('god');
        $products->loc = json_encode($request->input('loc'));

        $products->save(); 
        //dd($products->loc);
        
        return view('admin.products.create.location_sity',  compact('products', 'School', 'ExternalOrgunit', 'city')) ->withProduct($products);
    }

    public function storeSchool(Request $request)
    {
        $products =  products::latest()->first();
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        

        if ($products === null) {
            return response()->json(
                [
                    'message' => 'Product not found.'
                ], 404);
        }
        $products->sity = $request->input('sity');
        $products->save(); 
        //dd($products->org  );
        
        return view('admin.products.create.location_school',  compact('products', 'School', 'ExternalOrgunit', 'city')) ->withProduct($products);

 
    }
    public function storeClass(Request $request)
    {
        $products =  products::latest()->first();
        $ExternalOrgunit = new ExternalOrgunit;
        $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
        $School = new School();
        $city = new Kladr;
        $School = $School->inRandomOrder()->get();
        $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();

        if ($products === null) {
            return response()->json(
                [
                    'message' => 'Product not found.'
                ], 404);
        }
        $products->scul = $request->input('scul');
        $products->save(); 
        //dd($products->org  );
        //$products->name = $request->input('name[]');
         
    $products->save();
    return view('admin.products.create.location_class',  compact('products', 'School', 'ExternalOrgunit', 'city', 'classes')) ->withProduct($products);
}
public function storeClassE(Request $request)
{
    $products =  products::latest()->first();
    $ExternalOrgunit = new ExternalOrgunit;
    $ExternalOrgunit = $ExternalOrgunit->inRandomOrder()->get();
    $School = new School();
    $city = new Kladr;
    $School = $School->inRandomOrder()->get();
    $classes =  School::first()->classes()->orderByRaw('number asc, letter asc, year asc')->get();

    if ($products === null) {
        return response()->json(
            [
                'message' => 'Product not found.'
            ], 404);
    }
     
    $products->name = $request->input('name');
    $products->save(); 
    //dd($products->org  );
    //$products->name = $request->input('name[]');
     
$products->save();
return redirect()->route('products.index',  compact('products', 'School', 'ExternalOrgunit', 'city', 'classes')) ->withProduct($products);
}
  
     
}