// NodeMCU esp8266 save data to mysql database with POST methode
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include "max6675.h"

//max6675
byte thermoDO = 4;
byte thermoCS = 5;
byte thermoCLK = 16;

//pin sensor
const int getaran = A0;
 
const char* ssid = "IRTEK2022_ext";
const char* password = "n47sfm6F";

//init sensor
int suhucelcius;
int dataGetar;

String messagesuhu;
String messagegetar;

MAX6675 thermocouple(thermoCLK, thermoCS, thermoDO);
WiFiClient wifiClient;

//WIFI INIT
void initWiFi(){
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
    int i=0;
    while(WiFi.status() != WL_CONNECTED){ 
      Serial.print(".");
      delay(1000);     
    } 
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println();
  delay(2000); 
}

void suhu () {
  suhucelcius = thermocouple.readCelsius();

  if (suhucelcius >= 25 && suhucelcius <= 90) {
    messagesuhu = "Suhu Normal";
  }

  else if (suhucelcius >= 90 && suhucelcius <= 96) {
    messagesuhu = " Mesin dalam keadaan waspada";

  }

  else {
    messagesuhu = " Mesin dalam keadaan bahaya!!!!!";
  }

  Serial.println(suhucelcius);
  Serial.println(messagesuhu);
  // For the MAX6675 to update, you must delay AT LEAST 250ms between reads!
  delay(1000);
}

void getar () {
  dataGetar = analogRead (getaran);

  const int netral = 31;
  const int batas_satu = 62;
  const int batas_dua = 95;
  const int maxGetar = 126;

  if (dataGetar > 0 && dataGetar < netral) {
    messagegetar = "Aman";
  }

  else if (dataGetar > netral && dataGetar < batas_satu) {
    messagegetar = "Diperbolehkan";
  }

  else if (dataGetar > batas_satu && dataGetar < batas_dua) {
    messagegetar = "Lumayan";
  }

  else if (dataGetar > batas_dua && dataGetar < maxGetar) {
    messagegetar = "Berbahaya";
  }

  Serial.println(dataGetar);
  Serial.println(messagegetar);
  delay(200);

}

void insertAPI(int getar, String kondisiGetar, int suhu, String kondisiSuhu){
  if ((WiFi.status() == WL_CONNECTED)) {
    WiFiClient client;
    HTTPClient http;
    
    StaticJsonDocument<200> doc;
    String url, nodemcuData; 
    
    //equate with your computer's IP address and your directory application
    // C:\xampp\htdocs\arducoding_tutorial\nodemcu_log\webapi\api\create.php
     // url ="http://192.168.100.179/Tugasakhir_Larassanti/api/apisuhu.php";
   url ="http://ec2-34-201-78-219.compute-1.amazonaws.com/test.php";
    
    doc["suhu"] = String(suhu);
    doc["kondisiSuhu"] = String(kondisiSuhu);
    doc["getar"] = String(getar);
    doc["kondisiGetar"] = String(kondisiGetar);
   
    http.begin(client,url);
    http.addHeader("Content-Type", "application/json");
    
    serializeJson(doc, nodemcuData);
    Serial.print("POST data >> ");
    Serial.println(nodemcuData); 
  
    int httpCode = http.POST(nodemcuData);//Send the request
    String payload;  
    if (httpCode > 0) { //Check the returning code    
        payload = http.getString();   //Get the request response payload
        payload.trim();
        if( payload.length() > 0 ){
           Serial.println(payload + "\n");
        }
    }
    
    http.end();   //Close connection
  }else{
    Serial.print("Not connected to wifi ");
    Serial.println(ssid);
  }
  
}

void setup() {
  Serial.begin(115200);
  initWiFi();
  pinMode(getaran, INPUT);

 
}
void loop() {

  suhu();
  getar();
  insertAPI(dataGetar, messagegetar, suhucelcius, messagesuhu);
  delay(500); //interval 5 minute
  
}
