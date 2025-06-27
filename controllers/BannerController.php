<?php

namespace Admin;

use database\DataBase;
use models\Banner;


class BannerController extends AdminController{

    private $banner_model;


    public function __construct(){
        $pdo = new DataBase();
        $this->banner_model = new Banner($pdo);
    }
    
    public function index()
    {
        $banners = $this->banner_model->getAllBanners();
        require_once(BASE_PATH . '/views/panel/banners/index.php');
    }

    public function create()
    {
        require_once(BASE_PATH . '/views/panel/banners/create.php');
    }

    public function store($request)
    {
        $request['image'] = $this->saveImage($request['image'], 'banner-image');
        $insert = $this->banner_model->bannerInsert($request);
        // if($banner){

        // }else{

        // }
        $this->redirect('admin/banners');
    }

    public function edit($id)
    {
        $banner = $this->banner_model->getBannerById($id);
        require_once(BASE_PATH . '/views/panel/banners/edit.php');
    }

    public function update($request , $id)
    {
        if($request['image']['tmp_name'] != null){
            // dd('hi1');
            $banner = $this->banner_model->getBannerById($id);
            $this->removeImage($banner['image']);
            $request['image'] = saveImage($request['image'] , 'banner-image');
        }else{
            // dd('hi2');
            unset($request['image']);
        }
        // dd('hi3');
        $update = $this->banner_model->bannerUpdate($id , $request);
        if(!$update)
        {
            flash('update_banner_failed' , 'عملیات با خطا مواجه شد.');
            $this->redirectBack();
        }
        flash('update_banner_success' , 'بروز رسانی با موفقیت انجام شد.');
        $this->redirect('admin/banners');
    }

    public function delete($id)
    {
        $delete = $this->banner_model->bannerDelete($id);
        if(!$delete)
        {
            flash('delete_banner_failed' , 'عملیات با خطا مواجه شد.');
            $this->redirectBack();
        }
        flash('delete_banner_success' , ' این بنر با موفقیت حذف شد.');
        $this->redirectBack();
    }

    public function toActive($id)
    {
        $request['is_active'] = 2; 
        $update = $this->banner_model->bannerUpdate($id , $request);
        // $db->update('banners' , $id , ['is_active'] , [2]);

        if(!$update)
        {
            flash('activation' , 'انجام نشد');
            $this->redirectBack();
        }
        flash('activation' , 'این بنر فعال شد');
        $this->redirectBack();
    }

    public function toNotActive($id)
    {
        $request['is_active'] = 1; 
        $update = $this->banner_model->bannerUpdate($id , $request);
        // $db->update('banners' , $id , ['is_active'] , [1]);

        if(!$update)
        {
            flash('activation' , 'انجام نشد');
            $this->redirectBack();
        }
        flash('activation' , 'این بنر غیر فعال شد');
        $this->redirectBack();
    }


}


?>