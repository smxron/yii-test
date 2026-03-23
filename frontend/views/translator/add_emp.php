<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Translator;

$this->title = 'Добавить переводчика';

if (!isset($model)) {
    $model = new Translator();
}

?>

<div class="main">
    <h2>📝 Добавление переводчика</h2>

    <?php if ($message): ?>
        <div class="message">
            ✨ <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput([
        'placeholder' => 'Введите полное имя'
    ])->label('👤 ФИО переводчика') ?>

    <?= $form->field($model, 'email')->textInput([
        'type' => 'email',
        'placeholder' => 'example@mail.com'
    ])->label('📧 Адрес электронной почты') ?>

    <?= $form->field($model, 'work_type')->dropDownList([
        1 => '📆 По будням (пн-пт)',
        2 => '🎉 В любые дни (включая выходные)',
    ])->label('📅 График работы') ?>

    <button type="submit">
        💾 Сохранить переводчика
    </button>

    <?php ActiveForm::end(); ?>

    <div class="info-text">
        <a href="<?= \yii\helpers\Url::to(['/translator/index']) ?>">← Вернуться к списку</a>
    </div>
</div>

<style>
    .main {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        padding: 40px;
        max-width: 500px;
        width: 100%;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        color: #333;
        margin-bottom: 30px;
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .message {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        animation: slideIn 0.3s ease-out;
        font-weight: 500;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-20px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-weight: 500;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    input, select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        font-family: inherit;
        background-color: #f8f9fa;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    input:hover, select:hover {
        border-color: #9b59b6;
    }

    button {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-top: 10px;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    button:active {
        transform: translateY(0);
    }

    .info-text {
        text-align: center;
        margin-top: 20px;
        font-size: 12px;
        color: #999;
    }

    .info-text a {
        color: #667eea;
        text-decoration: none;
    }

    .info-text a:hover {
        text-decoration: underline;
    }

    /* Адаптивность */
    @media (max-width: 600px) {
        .main {
            padding: 30px 20px;
        }

        h2 {
            font-size: 24px;
        }

        input, select, button {
            font-size: 14px;
        }
    }
</style>
