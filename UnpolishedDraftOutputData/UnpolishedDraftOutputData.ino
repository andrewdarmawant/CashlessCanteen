#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include <Keypad.h> // changed
#include <SPI.h>
#include <MFRC522.h>


#define RST_PIN         9          // Configurable, see typical pin layout above
#define SS_PIN          10         // Configurable, see typical pin layout above

 /* 
 * Typical pin layout used:
 * -----------------------------------------------------------------------------------------
 *             MFRC522      Arduino       Arduino   Arduino    Arduino          Arduino
 *             Reader/PCD   Uno/101       Mega      Nano v3    Leonardo/Micro   Pro Micro
 * Signal      Pin          Pin           Pin       Pin        Pin              Pin
 * -----------------------------------------------------------------------------------------
 * RST/Reset   RST          9             5         D9         RESET/ICSP-5     RST
 * SPI SS      SDA(SS)      10            53        D10        10               10
 * SPI MOSI    MOSI         11 / ICSP-4   51        D11        ICSP-4           16
 * SPI MISO    MISO         12 / ICSP-1   50        D12        ICSP-1           14
 * SPI SCK     SCK          13 / ICSP-3   52        D13        ICSP-3           15
 */
 
// Set the LCD address to 0x27 for a 16 chars and 2 line display
LiquidCrystal_I2C lcd(0x27, 16, 2);
//LiquidCrystal_I2C lcd(0x27, 4, 5, 6, 0, 1, 2, 3, 7, POSITIVE);
//lcd SDA is pin A4 snd SCL is pin A5
const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns
char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
//5, 4, 3, 2 
//9, 8, 7, 6
byte rowPins[ROWS] = {A3, 2, 3, 4}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {5, 6, 7, 8}; //connect to the column pinouts of the keypad

Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);

MFRC522 mfrc522(SS_PIN, RST_PIN);  // Create MFRC522 instance
String UIDx;
String priceString;
String balanceString;
String realbalanceString;
bool outs;
bool outs2;
bool outs3;
long price;  
long balance; 
int locationaftervalid;

void setup()
{
  Serial.begin(115200);   // Initialize serial communications with the PC
//  lcd.init(); // initialize the LCD kalau I punya begin
  lcd.init();
  lcd.backlight(); // Turn on the blacklight and print a message.
  lcd.print("Turning on");
  delay(2000);
  }

void loop()
{ 
priceString="";
balanceString="";
outs= false;
outs2=false;
outs3=false;
lcd.clear();
lcd.setCursor(0,0);
//Serial.println("Enter Price in Keypad");
lcd.print("Price:");
lcd.setCursor(0,1);
lcd.print("Rp.");

do{
  char key = keypad.getKey(); 
  if (key!=NO_KEY&&key!='#'&&key!='A'&&key!='B'&&key!='C'&&key!='D'&&key!='*'){
    //Serial.println(key);
    priceString=priceString+key;
    lcd.setCursor(4,1);
    lcd.print(priceString);
  }
  if (key == '#'){
    //Serial.println(priceString);
    outs = true;
    }
  if (key == 'D'){
    lcd.setCursor(0,1);
    return;
    priceString=""; // maybe can reset the whole loop
    }
  if(key=='A'){
    int StrLenS=priceString.length(); 
    priceString.remove(StrLenS-1);//because A is included
  }
}while (outs == false);  
//can be put in the function

Serial.println(priceString);
delay(1000);
lcd.clear();    
SPI.begin();      // Init SPI bus
mfrc522.PCD_Init();   // Init MFRC522

do{ 
UID();
}while(outs2 == false);

//Serial.print(outputwifi);

do{
scanfromwifi();  
}while(outs3 == false);

int locationaftervalid= balanceString.lastIndexOf("validated") + 9; // find location of a particular string // change if php change
realbalanceString= balanceString.substring(locationaftervalid); //get the balance after the word validated // maybe change validated into a string then use strlen
//Serial.print(realbalanceString);

if(balanceString.indexOf("validated")>=0) {
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Error");//change if more error option
  delay(5000);
  return;
}

lcd.clear();
lcd.setCursor(0,0);
lcd.print("Transaction");
lcd.setCursor(0,1);
lcd.print("Successful");
delay(1500);
lcd.clear();
lcd.print("your balance is:");
lcd.setCursor(0,1);
lcd.print("Rp.");
lcd.setCursor(3,1);
lcd.print(realbalanceString);
delay(1500);
}
//delay(5000);

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

void scanfromwifi(){
  while (Serial.available()==0) {}
  balanceString = Serial.readString();
  outs3=true;
}
