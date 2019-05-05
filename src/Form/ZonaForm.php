<?php

namespace Drupal\zona\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Zona edit forms.
 *
 * @ingroup zona
 */
class ZonaForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\zona\Entity\Zona */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

	if(!$entity->get('id')->value){
	  $form['code'] = [
        '#title' => 'Code',
        '#type' => 'number',
        '#default_value' => '0',
		'#weight' => '-10',
		'#required' => TRUE,
      ];
	}
	
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\wilayah_indonesia_province\Entity\Province */		
	parent::validateForm($form, $form_state);

    $entity = $this->entity;

	if(is_null($entity->id())){
	  $id = \Drupal::entityQuery('zona')
	        ->condition('id', $form_state->getValue('code'))
			->range('0', '1')
			->execute();
	  if(!empty($id)){
	    $form_state->setErrorByName('code',"The zona code field already exist");
	  }
	}
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

	if(is_null($entity->id())){
		$entity->set('id', $form_state->getValue('code'));
	}
	
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Zona.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Zona.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.zona.canonical', ['zona' => $entity->id()]);
  }

}
