# Microcontroladores — Controle de acesso com ESP32 + RFID

Sistema de controle de acesso: o ESP32 lê tags RFID (MFRC522), valida em uma API remota e guarda as credenciais localmente (SPIFFS) para funcionar offline. Sinaliza o resultado com LEDs, buzzer, display LCD I2C e uma página web de monitoramento.

- `project/` — firmware ESP32 (PlatformIO, framework Arduino)
- `api/` — API Laravel de credenciais (`GET/POST /api/credentials`, `DELETE /api/credentials/{id}`, `POST /api/access`)

## Hardware

ESP32, leitor MFRC522, LCD 16x2 I2C, LED verde e vermelho, buzzer e tranca.

| Componente | Pino |
|---|---|
| RFID SCK / MOSI / MISO / SDA(SS) / RST | 18 / 23 / 19 / 5 / 4 |
| LED verde / LED vermelho | 26 / 25 |
| Buzzer / Tranca | 15 / 13 |
| LCD I2C | SDA/SCL padrão do ESP32 |

## Como executar

### API

Requisitos: PHP 8.2+, Composer.

```bash
cd disciplinas/microcontroladores/api
composer install
cp .env.example .env && php artisan key:generate
touch database/database.sqlite   # se usar SQLite
php artisan migrate
php artisan serve --host=0.0.0.0
```

### Firmware

Requisitos: [PlatformIO](https://platformio.org/).

1. Em `project/src/main.cpp`, defina `ssid`, `password` da sua rede WiFi e `API_URL` apontando para a sua API.
2. Compile e envie:

   ```bash
   cd disciplinas/microcontroladores/project
   pio run -t upload
   pio device monitor   # 115200 baud; mostra o IP do ESP32
   ```

3. Acesse o IP exibido para ver a página de status (`/`) e o JSON (`/status`).
