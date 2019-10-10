<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Http\Controllers\Controller;
use App\Rules\AdminstorRule;

class LoginController extends Controller
{
    public function login()
    {
    	return view('Admin.login');
    }
	//退出登录
	public function logout(Request $request)
	{
		//清除session
		$request->session()->flush();
		//返回登陆界面
		return redirect('admin/login');
	}
	//检查是否存在
	public function check(Request $request)
	{
		$userInfo=$request->except('_token');
		//获取验证码
		$sessInfo=$request->session()->all();
		$code=$sessInfo['code'];
		
		if($userInfo['code']==$code)
		{
			$this->validate($request,[
			'username'=>'exists:vk_adminusers,username',
			'password'=>['exists:vk_adminusers,password',new AdminstorRule($userInfo['password'])]
			],
			[
				'username.exists'=>':attribute 不存在',
				'password.exists'=>':attribute 有误'
			],
			['username'=>'用户','password'=>'密码']);
			//存储session信息
			$infos=\DB::table('vk_adminusers')->where('username',$userInfo['username'])->first();
			$request->session()->put('infos',[
				'id'=>$infos->id,
				'username'=>$infos->username,
				'code'=>$code,
			]);
			return redirect('admin/index');
		}else
		{
			return redirect('admin/login')->with('error','验证码输入错误');	
		}
	}
	//验证码
	public function captcha($tmp)
	{
	    $phrase = new PhraseBuilder;
	    // 设置验证码位数
	    $code = $phrase->build(4);
	    // 生成验证码图片的Builder对象，配置相应属性
	    $builder = new CaptchaBuilder($code, $phrase);
	    // 设置背景颜色
	    $builder->setBackgroundColor(mt_rand(150,255),mt_rand(150,255), mt_rand(150,255));
	    $builder->setMaxAngle(30);
	    $builder->setMaxBehindLines(10);
	    $builder->setMaxFrontLines(10);
	    // 可以设置图片宽高及字体
	    $builder->build($width =120, $height = 40, $font =null);
	    // 获取验证码的内容
	    $phrase = $builder->getPhrase();
	    // 把内容存入session
	    \Session::flash('code', $phrase);
	    // 生成图片
	    header("Cache-Control: no-cache, must-revalidate");
	    header("Content-Type:image/jpeg");
	    $builder->output();
	}
	
	
}

