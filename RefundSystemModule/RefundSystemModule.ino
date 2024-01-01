#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include <Keypad.h> 
#include <SPI.h>
#include <MFRC522.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

#define RST_PIN         9          // Configurable, see typical pin layout above
#define SS_PIN          10         // Configurable, see typical pin layout above

MFRC522 mfrc522(SS_PIN, RST_PIN);

String balanceString;
String realbalanceString;
String UIDx;
String indicator= "Your refunded money is Rp ";

int len= indicator.length();

bool outs;
bool outs2;
bool outs3;

void setup()
{
  Serial.begin(115200);   // Initialize serial communications with the PC
  lcd.init(); 
  lcd.backlight(); // Turn on the blacklight and print a message.
  lcd.print("Turning on");
  delay(2000);
  }

void loop(){

lcd.clear();    
SPI.begin();      // Init SPI bus
mfrc522.PCD_Init();   // Init MFRC522

outs=false;
outs2=false;

do{ 
UID();
}while(outs2 == false);

lcd.clear();
lcd.setCursor(0,0);
lcd.print("Your card");
lcd.setCursor(0,1);
lcd.print("is verified");

do{
scanfromwifi();  
}while(outs == false);

int locationaftervalid= balanceString.lastIndexOf(indicator) + len; // find location of a particular string // change if php change
realbalanceString= balanceString.substring(locationaftervalid); //get the balance after the word validated // maybe change validated into a string then use strlen
//Serial.print(realbalanceString);
lcd.clear();
lcd.setCursor(0,0);
lcd.print("Transaction");
lcd.setCursor(0,1);
lcd.print("Successful");
lcd.clear();
lcd.setCursor(0,0);
lcd.print("Your balance is:");
lcd.setCursor(0,1);
lcd.print(realbalanceString);
delay(3000);
}

void scanfromwifi(){
  while (Serial.available()==0) {}
  balanceString = Serial.readString();
  outs=true;
}

void UID(){
  lcd.setCursor(0, 0);
  lcd.print("Put your card to");
  lcd.setCursor(0, 1);
  lcd.print("the reader......");
  delay(300);

  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }

  content.toUpperCase();
  UIDx=content.substring(1);
  UIDx.replace(" ", "%20");
  Serial.print(UIDx);
  lcd.setCursor(0, 0);
  //lcd.print("ID : ");
  //Serial.println(content.substring(1));
  //lcd.print(content.substring(1));
  delay(1000);
  lcd.setCursor(0, 1);

  outs2=true;
  delay(1000);  


  
}
