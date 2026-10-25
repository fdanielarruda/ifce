# Computação Gráfica — Campo de Futebol 3D

Jogo de cobrança de pênalti (Brasil x Argentina) com o campo desenhado em perspectiva 3D usando HTML e CSS. O jogador define direção (seta) e força (barra de intensidade/medidor) e chuta a bola; o placar é atualizado.

**Stack:** HTML, CSS e JavaScript puro, sem dependências.

## Como executar

Abra `index.html` no navegador, ou sirva a pasta:

```bash
cd disciplinas/computacao-grafica
python3 -m http.server 8000
# http://localhost:8000
```

## Estrutura

- `index.html` — página do jogo
- `css/` — estilos do campo, jogo e placar
- `js/` — lógica (`game.js`), barra de intensidade, medidor e execução
- `images/`, `flags/` — recursos visuais
