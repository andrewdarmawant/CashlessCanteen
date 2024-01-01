#include <ESP8266WiFi.h>

const char* ssid     = "Tenda1"; //Wi-Fi SSID // change 
const char* password = "1234567890"; //Wi-Fi Password  // change

//const char* ssid     = "iPhone N"; //Other Wi-Fi SSID 
//const char* password = "gantilah"; //Other Wi-Fi Password

//char server[] = "192.168.1.13"; //IP address of Halim.
//char server[]= "192.168.1.8";//IP address for tenda
String server="cashlesscanteeniics.com";
//unsigned char server[] = "cashlesscanteeniics.com";
//chsnge Server IP or domain name

String rcv="";
String mod= "testing";
String uid= "2900";
String price= "12000";
void setup() {
  Serial.begin(115200);
  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
//  WiFi.config(ip,gatewayDNS,netmask,gatewayDNS); //Only used if using Static IP 
  WiFi.begin(ssid, password); //Connecting to the network
  
  while (WiFi.status() != WL_CONNECTED) { //Wait till connects
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  //Serial.println(WiFi.localIP()); //Use if using DHCP to know the IP


}

void loop() {
  delay(5000);
/*    while (Serial.available()=0){
  }
     idk=Serial.readString();
//     Serial.println(idk);
//     Serial.println("Separation");
  
*/
  Serial.print("connecting to ");
  Serial.println(server);
  WiFiClient client; //Client to handle TCP Connection
  const int httpPort = 80; // change if https
  
  if (!client.connect(server, httpPort)) { //Connect to server using port httpPort
    Serial.println("connection failed");
    return;
  }
  
  // We now create a URI for the request
  String url = "/test/hello.php?data1=787348&data2=7387"; //File or Server page you want to communicate with. along with data

  if (client.connect(server, 80)) 
  {
    Serial.println("Connection established 1");
    client.print("GET /willie69/willie69/testing1.php");// + " HTTP/1.1\r\n" + "Host: " + server + "\r\n" + "Connection: close\r\n\r\n"); //GET request for server response.
    client.print("?uid=");
    client.print(uid);
    client.print("&&price=");
    client.print(price);
    client.println(" HTTP/1.1"); 
    client.println("Host: " + server); 
    client.println("Connection: close"); 
    client.println(); 

    unsigned long timeout = millis();
    while (client.available() == 0) 
    {
      if (millis() - timeout > 25000) //If nothing is available on server for 25 seconds, close the connection.
      { 
        return;
      }
    }
    String rcv= "";
    while(client.available())
    {
      String line = client.readStringUntil('\r'); //Read the server response line by line..
      rcv+=line; //And store it in rcv.
    }
    Serial.print(rcv);
    client.stop(); // Close the connection.
  }
  else
  {
    Serial.println("Connection failed 1");
  }
  }
