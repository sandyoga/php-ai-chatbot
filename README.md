# PHP AI Chatbot (Free API) 🤖

A simple AI chatbot built using Core PHP and OpenRouter free AI models with a WhatsApp-style chat interface.

## Features
- WhatsApp-style chat interface with left/right message alignment
- Loading spinner on send button
- AI-generated responses
- Clean and responsive UI
- Uses free AI models (Mistral, Llama, Gemma)
- Auto-scroll to latest messages

## Setup Instructions

### 1. Get Free API Key
Visit: https://openrouter.ai/keys

### 2. Configure API Key
1. Copy `config.example.php` to `config.php`:
   ```bash
   cp config.example.php config.php
   ```
2. Edit `config.php` and add your API key:
   ```php
   define('OPENROUTER_API_KEY', 'your_key_here');
   ```

**Note:** `config.php` is excluded from Git via `.gitignore` to protect your API key.

### 3. Run Locally
Use XAMPP / WAMP / MAMP:

```
http://localhost/php-ai-chatbot/
```

## Security
- API keys are protected with `.gitignore`
- `config.php` is excluded from version control
- Use `config.example.php` as a template

## Author
sandyoga
