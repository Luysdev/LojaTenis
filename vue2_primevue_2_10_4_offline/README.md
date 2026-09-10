# Portal Vue 2 + PrimeVue 2.10.4 — Offline

Projeto preparado para não depender de CDN em runtime.

## Arquivos locais

- Vue 2.7.16
- PrimeVue 2.10.4 DataTable
- PrimeVue 2.10.4 Column
- PrimeVue CSS
- Tema Saga Blue
- PrimeIcons CSS

Os arquivos JavaScript foram fornecidos pelo usuário e estão armazenados localmente.

## Estrutura

portal/
├── index.php
├── js/
│   ├── vue2/
│   │   └── vue-2.7.16.js
│   └── primevue/
│       └── 2.10.4/
│           ├── datatable.umd.min.js
│           └── column.umd.min.js
└── css/
    ├── primevue/
    │   ├── primevue.min.css
    │   └── theme.min.css
    └── primeicons/
        └── primeicons.min.css

## Importante sobre PrimeIcons

O CSS enviado referencia fontes relativas em:

css/primeicons/fonts/

Os arquivos de fonte não foram anexados nesta conversa. Portanto, a tabela,
filtros e lógica JavaScript são locais, mas os ícones do PrimeVue podem não
aparecer até que a pasta `fonts` do PrimeIcons seja colocada em:

css/primeicons/fonts/

Isso não cria nenhuma dependência de CDN; basta adicionar os arquivos de fonte.

## Executar

```bash
php -S localhost:8000
```

Abrir:

http://localhost:8000

Para validar completamente a independência de rede, desligue a internet
depois de iniciar o servidor.

## Consulta

O PHP gera o resultado:

```php
$usuarios
```

e passa para o Vue:

```php
json_encode($usuarios)
```

Em produção, substitua por PDO.

## Filtros

O DataTable usa as propriedades do PrimeVue 2:

- `filter`
- `filter-match-mode`
- `filter-display`
- `filters.sync`

Filtros implementados:

- ID: equals
- Nome: contains
- E-mail: contains
- Status: equals
