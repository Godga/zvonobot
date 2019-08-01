@extends('layouts.base')
	<h1> Форма регистрации</h1>
	<form class="" action="{{URL::to('/user')}}" method="post">
		<ul>
			<li><input type="text" placeholder="Имя пользователя" name="name" value=""></li><br/>
			<li><input type="text" placeholder="Электронная почта" name="email" value=""></li><br/>
			<li><input type="password" placeholder="Пароль" name="password" value=""></li><br/>
			<li><input type="password" placeholder="Повтор пароля" name="repeat_password" value=""></li><br/><input type="hidden" name="_token" value="{{csrf_token()}}"></li>
			<li><button type="submit" name="butt">Зарегистрироваться</button>
		</ul>
	</form>