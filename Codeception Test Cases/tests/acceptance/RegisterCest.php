<?php
use \Codeception\Step\Argument\PasswordArgument;

class RegisterCest
{

    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
	// Trying to test TASK 1	
	/*Go to the Hotelmanager Registration page, Search for “Dusseldorf” as a hotel
name, pick the 5th hotel from the dropdown, fill out the form and submit.*/
	
	public function tryToTestRegistrationPage(AcceptanceTester $I)
    {
				 $I->amOnPage('/');
		         $I->wantTo('test Register');	
                 $I->wait(5);
	             $I->click("//a[@id='register-wideMenu']/span");
                 $I->seeCurrentURLEquals('/hotelmanager/register');
                 $I->fillField("//input[@id='registration[hotel_input]']", "Düsseldorf");
                 $I->wait(5);	            
				 $I->click("//li[5]/span/span[2]/p");
				
                 $I->fillField("#RegistrationForm_personalData_firstName", "Harun");
                 $I->fillField("#RegistrationForm_personalData_lastName", "Yazgan");
				 $I->selectOption('RegistrationForm[personalData][position]', '4');
                 $I->selectOption('RegistrationForm[personalData][phone][locale]', 'US');
				 $I->fillField("#RegistrationForm_personalData_phone_number", "8054180556");
                 $I->fillField('RegistrationForm[personalData][email]', 'test@test.com');
				 
				 $I->fillField('RegistrationForm[personalData][password]', new PasswordArgument('test12345'));
                 $I->wait(5);
				 $I->scrollTo('#RegistrationForm_personalData_password');
                 $I->checkOption('RegistrationForm[personalData][terms]');
				 $I->click("//button[@type='submit']");
				 $I->wait(5);
				 //Because of Captcha I need to Assert like that
                 $I->SeeCurrentURLEquals('/hotelmanager/register');
				 
    }	
}
