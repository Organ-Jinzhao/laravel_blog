<?php
//文件上传接口，前后台共用
Route::post('uploadImg', 'PublicController@uploadImg')->name('uploadImg');
//发送短信
Route::post('/sendMsg', 'PublicController@sendMsg')->name('sendMsg');
//获取省市区方法
Route::get('/province','PublicController@getProvince')->name('province');
Route::get('/city/{id}','PublicController@getCity')->name('city');
Route::get('/area/{id}','PublicController@getArea')->name('area');

//读取Redis
Route::get('/savearticle','RedisController@saveArticle')->name('savearticle');




Route::group(['namespace'=>'Home','middleware'=>'visitor'],function (){
    //首页碎言碎语
    Route::get('/', 'IndexController@index')->name('home');
    Route::post('/index/more', 'IndexController@more')->name('/index/more');


    Route::get('/album', 'AlbumController@index')->name('album');

    Route::get('/about', 'AboutController@index')->name('about');
    //文章模块
    Route::get('/article', 'ArticleController@index')->name('article');
    Route::post('/article/more', 'ArticleController@more')->name('article/more');
    Route::get('/article/{id}/content', 'ArticleController@content')->name('article.content');
    Route::post('/article/like', 'ArticleController@like')->name('article.like');



    Route::get('/shop', 'ShopController@index')->name('shop');
    Route::get('/liuyan', 'LiuyanController@index')->name('liuyan');

});





//支付
Route::group(['namespace' => 'Home'], function () {
    //微信支付
    Route::get('/wechatPay', 'PayController@wechatPay')->name('wechatPay');
    //微信支付回调
    Route::post('/wechatNotify', 'PayController@wechatNotify')->name('wechatNofity');
});

//会员-不需要认证
Route::group(['namespace'=>'Home','prefix'=>'member'],function (){
    //注册
    Route::get('register', 'MemberController@showRegisterForm')->name('home.member.showRegisterForm');
    Route::post('register', 'MemberController@register')->name('home.member.register');
    //登录
    Route::get('login', 'MemberController@showLoginForm')->name('home.member.showLoginForm');
    Route::post('login', 'MemberController@login')->name('home.member.login');

});
//会员-需要认证
Route::group(['namespace'=>'Home','prefix'=>'member','middleware'=>'member'],function (){
    //个人中心
    Route::get('/','MemberController@index')->name('home.member');
    //退出
    Route::get('logout', 'MemberController@logout')->name('home.member.logout');
});



