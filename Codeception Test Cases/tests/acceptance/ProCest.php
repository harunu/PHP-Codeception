<?php


class ProCest
{	
	
    public function _before(AcceptanceTester $I)
    {

    }

    public function _after(AcceptanceTester $I)
    {
    }

    // TASK 2
    public function tryToTestProYoutube(AcceptanceTester $I)
    {
		//Click the “PRO” logo on the main page, ensure that the “watch video” button opens a pop-up with a youtube video in it
		  $I->amOnPage('/');
		  $I->wantTo('test Youtube link');	
          $I->wait(15);
		  $I->click("#upgrade-wideMenu");
		  $I->wait(5);
          $I->click("//span[3]");
		  $I->wait(1);
	
		  $I->amOnPage('/hotelmanager/pro');

		  $I->wait(5);
		  //Assert
          $I->dontSee('Request Consultation');
		  $I->wait(10);
			  
    }
	
	
	 // TASK 2
    public function tryToTestRequestConsultation(AcceptanceTester $I)
    {
		
		//then fill the form to request a consultation and submit./* It should be inside of tryToTestProYoutube class but I could not figure it to close youtube video for making false positive case I added new class*/
		
		  $I->amOnPage('/');
		
		  $I->wantTo('test Request Consultation');	
          $I->wait(5);
		  $I->click("#upgrade-wideMenu");
		  $I->wait(5);

          $I->click("//div[3]/div/a");
		  
		  $I->wait(2);
          $I->fillField("//input[@id='hotel_name']","Istanbul");
	      $I->wait(2);
				  
	      $I->click("//body[@id='top']/div/main/div[10]/div/form/div[3]/div/div/div/ul/li/span/em");
		 
          $I->fillField("#HotelManager_CommonContact_name", "Harun");
		  $I->fillField('#HotelManager_CommonContact_email', 'test@test.com');

          $I->selectOption('HotelManager_CommonContact[jobPosition]', '7');
          $I->selectOption('HotelManager_CommonContact[phone][locale]', 'US');
                 
		  $I->fillField('HotelManager_CommonContact[phone][number]', '8054180556');
          $I->click("//button[@type='submit']");
                 
		  // Assert
		  // $I->canSee('This phone number is invalid.');
		  $I->SeeCurrentURLEquals('/hotelmanager/pro');  
}
	
}	
	
	

