<?php
/*
 * Consulta simulada.
 *
 * No projeto real, substitua este array pela sua consulta PDO.
 *
 * $stmt = $pdo->query("
 *     SELECT id, nome, email, status
 *     FROM usuarios
 * ");
 * $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
 */
$usuarios = [
    ['id'=>1,'nome'=>'João','email'=>'joao@empresa.com','status'=>'Ativo'],
    ['id'=>2,'nome'=>'Maria','email'=>'maria@empresa.com','status'=>'Ativo'],
    ['id'=>3,'nome'=>'Pedro','email'=>'pedro@empresa.com','status'=>'Inativo'],
    ['id'=>4,'nome'=>'Ana','email'=>'ana@empresa.com','status'=>'Ativo'],
    ['id'=>5,'nome'=>'Carlos','email'=>'carlos@empresa.com','status'=>'Ativo'],
    ['id'=>6,'nome'=>'Juliana','email'=>'juliana@empresa.com','status'=>'Inativo'],
    ['id'=>7,'nome'=>'Rafael','email'=>'rafael@empresa.com','status'=>'Ativo'],
    ['id'=>8,'nome'=>'Fernanda','email'=>'fernanda@empresa.com','status'=>'Ativo'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vue 2 + PrimeVue 2.10.4 - Offline</title>

    <!-- Tudo local: nenhuma dependência de CDN -->
    <script src="./js/vue2/vue-2.7.16.js"></script>

    <link rel="stylesheet" href="./css/primevue/theme.min.css">
    <link rel="stylesheet" href="./css/primevue/primevue.min.css">
    <link rel="stylesheet" href="./css/primeicons/primeicons.min.css">

    <script src="./js/primevue/2.10.4/datatable.umd.min.js"></script>
    <script src="./js/primevue/2.10.4/column.umd.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 30px;
            background: #f5f6f8;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }

        .filter-input,
        .filter-select {
            width: 100%;
            box-sizing: border-box;
        }

        .filter-input {
            padding: .5rem;
        }

        .filter-select {
            padding: .5rem;
        }
    </style>
</head>

<body>

<div id="app" class="container">
    <div class="card">

        <h1>Vue 2 + PrimeVue 2.10.4</h1>

        <p>
            Registros retornados pela consulta PHP:
            <strong>{{ usuarios.length }}</strong>
        </p>

        <p-datatable
            :value="usuarios"
            :paginator="true"
            :rows="5"
            :rows-per-page-options="[5,10,20]"
            filter-display="row"
            :filters.sync="filters"
            sort-mode="multiple"
            striped-rows
            responsive-layout="scroll"
        >

            <p-column
                field="id"
                header="ID"
                sortable
                filter
                filter-match-mode="equals"
            >
                <template #filter="{filterModel,filterCallback}">
                    <input
                        type="number"
                        v-model="filterModel.value"
                        @input="filterCallback()"
                        class="p-inputtext filter-input"
                        placeholder="ID"
                    >
                </template>
            </p-column>

            <p-column
                field="nome"
                header="Nome"
                sortable
                filter
                filter-match-mode="contains"
            >
                <template #filter="{filterModel,filterCallback}">
                    <input
                        type="text"
                        v-model="filterModel.value"
                        @input="filterCallback()"
                        class="p-inputtext filter-input"
                        placeholder="Nome"
                    >
                </template>
            </p-column>

            <p-column
                field="email"
                header="E-mail"
                sortable
                filter
                filter-match-mode="contains"
            >
                <template #filter="{filterModel,filterCallback}">
                    <input
                        type="text"
                        v-model="filterModel.value"
                        @input="filterCallback()"
                        class="p-inputtext filter-input"
                        placeholder="E-mail"
                    >
                </template>
            </p-column>

            <p-column
                field="status"
                header="Status"
                sortable
                filter
                filter-match-mode="equals"
            >
                <template #filter="{filterModel,filterCallback}">
                    <select
                        v-model="filterModel.value"
                        @change="filterCallback()"
                        class="filter-select"
                    >
                        <option :value="null">Todos</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </template>
            </p-column>

        </p-datatable>
    </div>
</div>

<script>
new Vue({
    el: '#app',

    components: {
        'p-datatable': datatable,
        'p-column': column
    },

    data: {
        usuarios: <?= json_encode(
            $usuarios,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        ) ?>,

        filters: {
            id: {
                value: null,
                matchMode: 'equals'
            },
            nome: {
                value: null,
                matchMode: 'contains'
            },
            email: {
                value: null,
                matchMode: 'contains'
            },
            status: {
                value: null,
                matchMode: 'equals'
            }
        }
    }
});
</script>

</body>
</html>
