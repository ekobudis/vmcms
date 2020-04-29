<?php

namespace App\Helpers;

use App\Models\Career;
use App\Models\Client;
use App\Models\Permission;
use App\Models\Section;
use App\Models\Webmaster;
use App\Models\WebmasterBanner;
use App\Models\WebmasterDocument;
use App\Models\WebmasterSection;
use App\Models\WebmasterSocial;
use Carbon\Carbon;
use Harimayco\Menu\Facades\Menu;
use Harimayco\Menu\Models\MenuItems;

class Helper
{
    public static function getSiteCategoryType()
    {
        $section_type = array(
                            '0' => 'Without Categories',
                            '1' => 'Main categories only',
                            '2' => 'Main and sub categories'
                        );

        return $section_type;
    }

    public static function getSiteSectionType()
    {
        $section_type = array(
                            '0' => 'General',
                            '1' => 'Photo',
                            '2' => 'Video'
                        );

        return $section_type;
    }

    public static function getBannerSectionType()
    {
        $banner_type = array(
                            '0' => 'Code/Text',
                            '1' => 'Photo',
                            '2' => 'Video'
                        );

        return $banner_type;
    }

    public static function getTitleClass()
    {
        $banner_type = array(
                            '' => 'No Class',
                            'text-black' => 'Text Black',
                        );

        return $banner_type;
    }

    public static function getDataClass()
    {
        $banner_type = array(
                            '' => 'No Class',
                            'bg-white' => 'White Background',
                            'bg-white text-white' => 'White Background & Text',
                            'bg-primary' => 'Primary Background',
                            'bg-primary text-white' => 'Primary Background & White Text',
                            'bg-secondary' => 'Secondary Background',
                            'bg-secondary text-white' => 'Secondary Background & White Text',
                        );

        return $banner_type;
    }

    public static function getDocumentType()
    {
        $banner_type = array(
                            '0' => 'Company Profile',
                            '1' => 'Brochures',
                        );

        return $banner_type;
    }

    public static function getWebmaster()
    {
        $webmaster = Webmaster::with('workHour')->find(1);

        return $webmaster;
    }

    public static function getWebSocial()
    {
        $webmaster = WebmasterSocial::where('webmaster_id',1)->get();

        return $webmaster;
    }

    public static function getProductServiceItem()
    {
        $prodServices = Section::select('id','name')->where('status',0)->get();

        return $prodServices;
    }

    public static function getBackEndMenus()
    {
        $webmaster = WebmasterSection::select(\DB::raw('webmaster_sections.id,admin_menu_items.label,webmaster_sections.section_category,webmaster_sections.icon_name'))
                        ->join('admin_menu_items','admin_menu_items.id','=','webmaster_sections.menu_item_id')
                        ->where([
                            ['webmaster_sections.webmaster_id',1],
                            ['webmaster_sections.status',0]
                        ])
                        ->get();

        return $webmaster;
    }

    public static function getMenus()
    {
        $menus = MenuItems::select('id','label','link')
                        ->where('link','!=','#')
                        ->get();

        $array_menus = [];
        foreach ($menus as $model){
            $array_menus[$model->id] = $model->label;
        }

        return $array_menus;
    }

    public static function getPostMenus()
    {
        $menus = MenuItems::select('id','label','link')
                        ->where([
                            ['link','!=','#'],
                            ['id','!=',1]
                        ])
                        ->get();

        $array_menus = [];
        foreach ($menus as $model){
            $array_menus[$model->id] = $model->label;
        }

        return $array_menus;
    }

    public static function getCategoryByMenuID($id)
    {
        $catMenu = Section::select(\DB::raw('sections.id,sections.name,webmaster_sections.menu_item_id'))
                    ->join('webmaster_sections','webmaster_sections.id','=','sections.webmaster_section_id')
                    ->where('webmaster_sections.menu_item_id',$id)
                    ->get();

        return $catMenu;
    }

    public static function getClient()
    {
        $catMenu = Client::select(\DB::raw('id,name,logo'))
                    ->get();

        return $catMenu;
    }

    public static function getCareerInfo()
    {
        $catMenu = Career::select(\DB::raw('id,position,job_desc,created_at'))
                    ->get();

        return $catMenu;
    }

    public static function getMenuCategory()
    {
        $menus =Section::select(\DB::raw('id,name'))
                ->where('status',0)
                ->get();

        $array_menus = [];
        foreach ($menus as $model){
            $array_menus[$model->id] = $model->name;
        }

        return $array_menus;
    }

    public static function getBannerType()
    {
        $banners = WebmasterBanner::select(\DB::raw('id,row_no,banner_name,width,height'))->get();

        $array_banner = [];
        foreach ($banners as $model){
            $array_banner[$model->id] = $model->banner_name .' - '.$model->width . ' x '.$model->height;
        }

        return $array_banner;
    }

    public static function getPermission()
    {
        $banners = Permission::select(\DB::raw('id,name'))->where('status','!=',1)->get();

        $array_banner = [];
        foreach ($banners as $model){
            $array_banner[$model->id] = $model->name;
        }

        return $array_banner;
    }

    //Frontend Menus
    public static function getHeaderMenuFrontEnd()
    {
        $menus = Menu::getByName('Main Menu');

        return $menus;
    }

    public static function getFooterMenuFrontEnd()
    {
        $menus = Menu::getByName('Footer Menu');

        return $menus;
    }

    public static function getFooterMenuTop()
    {
        $menus = Menu::getByName('Top Menu');

        return $menus;
    }

    public static function getFooterUsefull()
    {
        $menus = Menu::getByName('Usefull Link');

        return $menus;
    }

    public static function getCompanyDocument()
    {
        $doc = WebmasterDocument::where('webmaster_id',1)->get();

        return $doc;
    }

}