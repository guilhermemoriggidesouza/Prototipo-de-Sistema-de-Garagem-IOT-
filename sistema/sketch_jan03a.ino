int trigPin =  13;
int echoPin = 5;
int led = 14;

//incluido bibliotecas, configurando o sensor e rede 
#include <ESP8266WiFi.h>
#include <Ultrasonic.h>
Ultrasonic ultrassonic(trigPin, echoPin);

const char* ssid = "Guiana";
const char* password = "robertos";

const char* host = "192.168.1.41";

int contador = 0;

void setup()   {
  //definindo pinos e conectando na rede
  pinMode(led, OUTPUT);
  pinMode(echoPin, INPUT);
  Serial.begin(9600);
  pinMode(trigPin, OUTPUT);
  digitalWrite(trigPin, 0);

  Serial.println("");
  Serial.print("Conectando");
  WiFi.begin(ssid, password);  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Conectado a rede: ");
  Serial.println(ssid);
  Serial.println("a placa é a: ");
  
}
 
void loop(){
  //criando um client e conectando no site
  WiFiClient client;
  const int porta = 80;
  if(!client.connect(host, porta)){
    Serial.println("deu ruim");
    return;
  }
  contador++;
  if(contador == 100000){
    Serial.println("JA DEU");
    delay(10000);
    contador = 0;
  }else{
      //calculando a distância e enviando para o site  
      float distancia = ultrassonic.Ranging(CM);
      client.print(String("GET /nodeMCU/sistema/php/adicionar.php?val=") + (distancia) + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");
      Serial.println(distancia);
      
  }
   delay(30);
}
