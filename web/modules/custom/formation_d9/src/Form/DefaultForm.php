<?php

namespace Drupal\formation_d9\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DefaultForm extends FormBase {
    public function getFormId() {
        return 'formation_d9_default_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['nom'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Nom et prénom'),
            '#required' => true,
        ];
        $form['objet'] = [
            '#type' => 'select',
            '#title' => $this->t('Objet'),
            '#options' => [
                '1' => $this->t("Demande d'information"),
                '2' => $this->t('Reclamation'),
            ],
            '#empty_option' => $this->t('Choisir'),
            '#suffix' => '<div id="ajax_wrapper"></div>',
            '#ajax' => [
              'callback' => '::ajaxExemple',
              'event' => 'change',
              'wrapper' => 'ajax_wrapper',
              'method' => 'html',
              'effect' => 'fade',
              'progress' => [
                'type' => 'throbber',
                'message' => 'Chargement...',
              ],
          ],
        ];
        $form['message'] = [
            '#type' => 'textarea',
            '#title' => $this->t('Message'),
        ];
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Envoyer'),
        ];

        $form_state->disableCache();

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
      \Drupal::messenger()->addMessage(
        t('Merci @nom, votre message est envoyé',
          ['@nom' => $form_state->getValue('nom')]
        ));
    }

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if ($form_state->isValueEmpty('message')) {
            $form_state->setErrorByName(
                'message',
                $this->t('Merci de remplir le champs Message!')
            );
        }
    }

    public function ajaxExemple(array &$form, FormStateInterface $form_state)
    {

        $text = 'Réponse Ajax: '. $form['objet']['#options'][$form_state->getValue('objet')];

        $response = new AjaxResponse();
        $response->addCommand(new HtmlCommand('#ajax_wrapper', $text));

        return $response;
    }
}
