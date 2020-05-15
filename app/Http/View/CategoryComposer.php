<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Models\Categorys;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories =  Categorys::select(\DB::raw('categorys.id,categorys.slug,categorys.name,categorys.description,categorys.icon,admin_menu_items.link'))
                        ->join('webmaster_sections','webmaster_sections.id','=','categorys.webmaster_section_id')
                        ->join('admin_menu_items','admin_menu_items.id','=','webmaster_sections.menu_item_id')
                        ->where('categorys.status',0)
                        ->get();

        $view->with('frontend.pages.service',$categories);
    }
}