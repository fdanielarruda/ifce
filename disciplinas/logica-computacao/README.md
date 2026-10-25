# Lógica para Computação — Satisfatibilidade proposicional

Projeto Prático 01 (prof. Thiago Alves Rocha): algoritmo que codifica um problema de classificação de pacientes (atributos binários → patologia / sem patologia) como fórmula da lógica proposicional e testa sua satisfatibilidade para encontrar um conjunto de regras.

Alunos: Antonio Eduardo de Andrade Sousa e Francisco Daniel Vasconcelos de Arruda.

**Stack:** Python 3 e [PySAT](https://pysathq.github.io/) (solver Glucose3).

## Como executar

```bash
cd disciplinas/logica-computacao
pip install python-sat
cd logic
python main.py ../pacientes/column_bin_<nº atributos>a_<nº pacientes>p.csv <nº de regras>
```

Exemplo:

```bash
python main.py ../pacientes/column_bin_3a_2p.csv 2
```

`main_2.py` é a variante que resolve com o solver SAT. A pasta `fase2/` contém a fase 2 (cláusulas em CNF resolvidas direto com o Glucose3): `python fase2/main.py`.

## Estrutura

- `logic/` — implementação (fórmulas, termos, semântica, restrições)
- `pacientes/` — bases de dados CSV (`column_bin_<atributos>a_<pacientes>p.csv`)
- `documentos/` — enunciado do projeto
