<?php
use \Codeception\Step\Argument\PasswordArgument;

class LoginCest
{

    public function _before(AcceptanceTester $I)
    {
        	
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // TASK3
    public function tryToTestLogin(AcceptanceTester $I)
    {     


        /*Test all possible error messages in the Hotelmanager login page, then go to
forget password link, type test@trivago.com as an email and send a password
reset request, ensure that request has been sent successfully*/

          $I->amOnPage('/');
          $I->wait(5);
          $I->click("#login-wideMenu");
        //$I->click("//body[@id='top']/div/main/div[2]/span");
         $I->fillField("#LoginForm_username", "asdasdsadsa");
         $I->fillField("#LoginForm_password", "123");
         $I->wait(5);

         $I->expect('This email is invalid. It must be in the format xx@yy.zz');
	     $I->see('This email is invalid. It must be in the format xx@yy.zz');
         $I->click("//button[@type='submit']");

	     $I->wait(5);
        
         $I->fillField("#LoginForm_username", "test@test.com");
         $I->fillField("#LoginForm_password", new PasswordArgument('123'));
         $I->click("//button[@type='submit']");
        
       
         $I->seeCurrentURLEquals('/hotelmanager/login.html');
         $I->wait(5);
         $I->see('Forgot your password');

 
         $I->click("//a[contains(@href, '/hotelmanager/lost_password.html')]");
         $I->fillField("#forgot_password_email", "test@trivago.com");
        
         $I->click("#forgot_password_submit");
         $I->expect('Password reset e-mail sent.');
         //Assert
	     $I->see('Password reset e-mail sent.');
    
    }
}
