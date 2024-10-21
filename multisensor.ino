//library DHT dan Wifi
#include "DHT.h"
#include <WiFi.h> //menggunakan <> dan bukan ""
#include "HTTPClient.h"

// Pin DHT11
#define DHTPIN 4 // pin GPIO4
#define DHTTYPE DHT11

// Objek DHT11
DHT dht(DHTPIN, DHTTYPE);

// Variabel Wifi Hotspot & Password
const char* ssid = "Livi";
const char* pass = "12tigaempat";

// Variabel Host/Server Web
const char* host = "192.168.1.5";

// Port Web Server = 8080
const int httpPort = 8080;

void setup() {
  // Serial Activation
  Serial.begin(9600);
  // DHT11 Activation
  dht.begin();

  // Setup Wifi
  WiFi.begin(ssid, pass); 
  Serial.println("Connecting...");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print("...");
    delay(500);
  }
  // If Success Connected
  Serial.println("Connected");
}

void loop() {
  // Read suhu & kelembaban
  float suhu = dht.readTemperature();
  int kelembaban = dht.readHumidity();
  // Read Nilai LDR
  int ldr = analogRead(A0);

  // Echo Sensor Value
  Serial.println("Suhu : " + String(suhu));
  Serial.println("Kelembaban : " + String(kelembaban));
  Serial.println("LDR : " + String(ldr));

  // Data -> Server
  WiFiClient client; 
  HTTPClient http; 

  // Jika koneksi berhasil
  if (!client.connect(host, httpPort)) {
    Serial.println("Connection Failed");
    return;
  }

  // Variabel Link
  String link;
  // Alamat Link 
  link = "http://" + String(host) + ":" + String(httpPort) + "/multisensor/kirimdata.php?suhu=" + String(suhu) + "&kelembaban=" + String(kelembaban) + "&ldr=" + String(ldr);

  // Eksekusi Alamat Link
  http.begin(link); 

  // Mendapatkan HTTP response code
  int httpResponseCode = http.GET(); // Kirim permintaan GET
  Serial.print("HTTP Response Code: ");
  Serial.println(httpResponseCode); // Tampilkan response code

  // Respon Setelah Sukses Nilai kirim sensor
  if (httpResponseCode > 0) {
    String respon = http.getString(); // Ambil respon dari server
    Serial.println("Response from server: " + respon);
  } else {
    Serial.print("Error on sending GET: ");
    Serial.println(httpResponseCode); // Jika gagal, cetak error
  }

  
  http.end();

  delay(1000); // Delay loopong selanjutnya
}

//xixixi, mulai projek jam 10 pagi, kelar jam 1 malem, itupun sensornya masih gajelas, xixixi
//Kesimpulan Hari ini
//Kerjain PHP di sublime, di Vscode akan ada beberapa kode yang "dianggap" salah karena kurangnya ekstension/library dan kurangnya ilmu saya
//gak tau kenapa library disini tidak bisa menggunakan "Wifi.h", Harus menggunakan <Wifi.h>, padahal abang abang koper bisa tch
//tidak jarang Library bisa konflik, dalam kode ini troubleshooting masalah Lib Wifi Lama karena tidak bertanya ke chatgpt dan masalah konflik Lib dipackages arduino15

//Total projek ini 80% jadi (Sensor masih salah)
// 4 jam Setting PHP dan Arduino sebelum tes menggunakan ESP32
// 1-2 Jam Troubleshooting Driver ESP32 dan Troubleshooting ESP32 tidak ke detect sama komputer
// 2 jam ngurusin Syntax yang dianggap salah di Vscode karena kurangnya Library, Belum/TIdak Download ekstension library yang benar untuk PHP
// 4 Jam troubleshooting Masalah jaringan Dari ESP -> Server, Terutama masalah Library Wifi.h