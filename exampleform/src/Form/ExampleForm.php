<?php

namespace Drupal\exampleform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase {

  public function getFormId() {
    return 'example_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['person_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Person Name'),
    );
    $form['age'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Age'),
    );
    $form['gender'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => array('Male' => t('Male'), 'Female' => t('Female')),
    );
    $form['dob'] = array(
      '#type' => 'date',
      '#title' => $this->t('Date of Birth'),
      '#default_value' => array(
      'year' => format_date(time(), 'custom', 'Y'),
      'month' => format_date(time(), 'custom', 'n'),
      'day' => format_date(time(), 'custom', 'j')),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    );
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message(
      $this -> t('Name: @name', ['@name' => $form_state -> getValue('person_name')])
    );
    drupal_set_message(
      $this -> t('Age: @age', ['@age' => $form_state -> getValue('age')])
    );
    drupal_set_message(
      $this -> t('Gender: @gen', ['@gen' => $form_state -> getValue('gender')])
    );
    drupal_set_message(
      $this -> t("Date of Birth: @dateofb", ['@dateofb' => $form_state -> getValue('dob')])
    );
  }
} ?>
