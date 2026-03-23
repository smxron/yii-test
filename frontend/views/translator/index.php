<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Тест';

?>

<div id="app-translators" class="translator-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div v-if="loading" class="alert alert-info">
        Загрузка данных...
    </div>

    <div v-else>
        <p><strong>Сегодня:</strong> {{ currentDay }}</p>
        <button @click="fetchTranslators" class="btn btn-primary mb-3">
            Обновить список
        </button>

        <div v-if="translators.length > 0">
            <h3>{{ apiMessage }}</h3>
            <ul class="list-group">
                <li v-for="translator in translators" :key="translator.id" class="list-group-item">
                    {{ translator.full_name }} ({{ translator.email }})
                </li>
            </ul>
        </div>

        <div v-else class="alert alert-warning">
            {{ apiMessage }}
        </div>
    </div>
</div>

<!-- Подключаем Vue и axios через CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const { createApp, ref, onMounted } = Vue;

    createApp({
        setup() {
            const translators = ref([]);
            const loading = ref(true);
            const currentDay = ref('');
            const apiMessage = ref('');

            const fetchTranslators = () => {
                loading.value = true;
                //axios.get('<?//= Url::to(['/translator/api-available']) ?>//')
                axios.get('<?= Url::to(['/translator/get-translators-api']) ?>')
                    .then(response => {
                        if (response.data.status === 'ok') {
                            translators.value = response.data.translators;
                            currentDay.value = response.data.day;
                            apiMessage.value = response.data.message;
                        } else {
                            translators.value = [];
                            currentDay.value = response.data.day;
                            apiMessage.value = response.data.message;
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка загрузки:', error);
                        translators.value = [];
                        apiMessage.value = 'Ошибка при загрузке данных';
                    })
                    .finally(() => {
                        loading.value = false;
                    });
            };

            onMounted(() => {
                fetchTranslators();
            });

            return {
                translators,
                loading,
                currentDay,
                apiMessage,
                fetchTranslators
            };
        }
    }).mount('#app-translators');
</script>

<style>
    .translator-index {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
    }
    .list-group-item {
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 5px;
    }
    .alert {
        padding: 15px;
        border-radius: 4px;
    }
    .alert-info {
        background-color: #d9edf7;
    }
    .alert-warning {
        background-color: #fcf8e3;
    }
</style>
