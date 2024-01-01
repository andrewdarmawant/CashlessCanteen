#include <ESP8266WiFi.h>

const char* ssid     = "Tenda1"; //Wi-Fi SSID
const char* password = "1234567890"; //Wi-Fi Password

//const char* ssid1     = "Tenda1"; //Other Wi-Fi SSID 
//const char* password1 = "1234567890"; //Other Wi-Fi Password

//Only used if using Static IP
//IPAddress ip(172, 20, 10, 6); //IP
//IPAddress gatewayDNS(192, 168, 0, 1);//DNS and Gewateway
//IPAddress netmask(255, 255, 255,0); //Netmask
char server[] = "192.168.1.13"; //IP address of your computer.
//Server IP or domain name
String rcv="";
String mod= "testing";
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

  Serial.print("connecting to ");
  Serial.println(server);
  
  WiFiClient client; //Client to handle TCP Connection
  const int httpPort = 80;
  if (!client.connect(server, httpPort)) { //Connect to server using port httpPort
    Serial.println("connection failed");
    return;
  }
  
  // We now create a URI for the request
  String url = "/test/hello.php?data1=787348&data2=7387"; //File or Server page you want to communicate with. along with data

  if (client.connect(server, 80)) 
  {
    Serial.println("Connection established 1");
    client.print("GET /tryjson.php/");// + " HTTP/1.1\r\n" + "Host: " + server + "\r\n" + "Connection: close\r\n\r\n"); //GET request for server response.
    client.println(" HTTP/1.1"); 
    client.println("Host: 192.168.1.13"); 
    client.println("Connection: close"); 
    client.println(); 


/*     while (client.available()) {
    char ch = static_cast<char>(client.read());
    Serial.print(ch);
    
  }
*/
/*
  unsigned long timeout2 = millis();
  while (client.available() == 0) {
    if (millis() - timeout2 > 25000) { //Try to fetch response for 25 seconds
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
*/
    unsigned long timeout = millis();
    while (client.available() == 0) 
    {
      if (millis() - timeout > 25000) //If nothing is available on server for 25 seconds, close the connection.
      { 
        return;
      }
    }
  while (client.available()) {
    char ch = static_cast<char>(client.read());
    Serial.print(ch);
  }
 //  while(client.available())
   // {
   //   String line = client.readStringUntil('\r'); //Read the server response line by line..
    //  rcv+=line; //And store it in rcv.
    //}
    //client.stop(); // Close the connection.
  }
  else
  {
    Serial.println("Connection failed 1");
  }
  Serial.println("Received string: ");
  Serial.println(rcv); //Display the server response.
  Serial.println("before this also");
  // This will send the request to the server 

      if (client.connect(server, 80)) 
      {
      Serial.println("Connection Established 2");
      client.print("GET /info.php?"); //GET request to write data to the database.
      client.print("request=");
      client.print(mod);
      client.println(" HTTP/1.1"); 
      client.println("Host: 192.168.137.1"); 
      client.println("Connection: close"); 
      client.println(); 
      client.println(); 
      client.stop();
      }
      else
      {
        Serial.println("Connection failed 2");
      }
/*
  
    
  Serial.println();
  Serial.println("closing connection");
  client.stop(); //Close Connection
 */
 
}
