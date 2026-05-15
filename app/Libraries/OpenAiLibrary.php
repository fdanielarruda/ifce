<?php

namespace App\Libraries;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAiLibrary
{
    protected function executar(array $messages): array
    {
        try {
            $url = env('OPENAI_API_URL');
            $token = env('OPENAI_API_KEY');
            $model = env('OPENAI_API_MODEL');

            if (!$url || !$token || !$model) {
                throw new Exception("Falta de credenciais para IA");
            }

            $data = [
                "model" => $model,
                "messages" => $messages,
                "temperature" => 0.3,
                "response_format" => [
                    "type" => "json_object"
                ]
            ];

            $response = Http::withHeaders(['Authorization' => "Bearer $token"])->post($url, $data);

            if ($response->failed()) {
                throw new Exception('Erro ao executar a requisição na API do OpenAI: ' . $response->body());
            }

            $apiResponse = $response->json();

            Log::info("Resposta completa da API OpenAI: " . json_encode($apiResponse));

            $content = $apiResponse['choices'][0]['message']['content'];

            return json_decode($content, true);
        } catch (Exception $e) {
            throw new Exception($e->getMessage() ?? "Erro ao processar transação com IA");
        }
    }

    public function naturalLanguageToJsonConverter(string $text, array $categories): array
    {
        $category_list = "'" . implode("', '", $categories) . "'";
        $first_category = $categories[0];
        $date = now();

        $comando = "Extraia as informações desta transação ou saldo financeiro: $text\n\n"
            . "Verifique o que faz sentido de acordo com o texto recebido. Entenda o contexto da mensagem. Ignore numeros relacionados a endereços, CEP, CPF e documentos de identificação. Veja se o valor faz sentido com a conta. Não retorne numeros extratosféricos.\n\n"
            . "REGRAS IMPORTANTES SOBRE O TIPO:\n"
            . "- Use 'saldo' APENAS quando o usuário informar explicitamente quanto tem na conta em linguagem natural (ex: 'tenho 1000 reais', 'saldo de 500 reais na conta').\n"
            . "- Use 'despesa' quando o texto for um cupom fiscal, nota fiscal, recibo ou comprovante de compra (ex: contém palavras como VENDA, TOTAL, CPF DO CLIENTE, CNPJ, nomes de estabelecimentos, datas de compra e valores).\n"
            . "- Use 'despesa' quando a forma de pagamento for CREDITO, DEBITO, CRÉDITO, DÉBITO, VISA, MASTERCARD, PIX ou qualquer bandeira de cartão — isso indica uma compra paga, não saldo em conta.\n"
            . "- Use 'receita' quando o texto indicar recebimento de dinheiro (ex: salário, transferência recebida, renda).\n\n"
            . "EXEMPLOS DE CUPOM FISCAL (sempre 'despesa'):\n"
            . "  Texto: 'VENDA 281,67 CREDITO VISA 49513' → type: 'despesa'\n"
            . "  Texto: 'TOTAL R\$ 50,00 DEBITO MASTERCARD' → type: 'despesa'\n"
            . "  Texto: 'PAGAMENTO VIA PIX R\$ 120,00' → type: 'despesa'\n\n"
            . "Retorne APENAS um JSON válido com estas chaves obrigatórias:\n"
            . "type: 'receita', 'despesa' ou 'saldo'\n"
            . "category: $category_list, procure outros ou 'Outros' para desconhecido\n"
            . "amount: número (apenas o valor numérico, sem símbolos. Converta valores por extenso, ex: 'mil' = 1000)\n"
            . "description: texto curto descritivo\n"
            . "reference_date: datetime se for identificável no texto, se não, retorne vazio. hoje é $date\n"
            . "Exemplo de resposta para saldo: { 'type': 'saldo', 'category': '', 'amount': 1000, 'description': 'saldo em conta', 'reference_date': '' }\n"
            . "Exemplo de resposta para despesa: { 'type': 'despesa', 'category': '$first_category', 'amount': 20, 'description': 'hamburguer', 'reference_date': '2025-10-19 10:04:00' }\n"
            . "Se não conseguir extrair um valor monetário retorne: { \"error\": \"Não consegui entender sua mensagem.\n\nTente descrever o valor e o tipo da transação, por exemplo:\n- Gastei 50 reais no mercado\n- Recebi 1000 reais de salário\n- Tenho 500 reais na conta\n\nOu envie um arquivo com o extrato.\" }";

        $messages = [
            [
                "role" => "user",
                "content" => $comando,
            ]
        ];

        return $this->executar($messages);
    }
}
