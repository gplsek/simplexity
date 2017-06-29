<?php
/**
 * @file
 * Contains \Drupal\simplexity\Form\CompanyForm.
 */

namespace Drupal\simplexity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CompanyForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'company_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['comany_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Company Name:'),
      '#required' => TRUE,
    );

    $form['admin_mail'] = array(
      '#type' => 'email',
      '#title' => t('Administrator Email:'),
      '#required' => TRUE,
    );

    $form['phone_number'] = array (
      '#type' => 'tel',
      '#title' => t('Phone no'),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
    public function validateForm(array &$form, FormStateInterface $form_state) {

      if (strlen($form_state->getValue('phone_number')) < 10) {
        $form_state->setErrorByName('phone_number', $this->t('Phone number is too short.'));
      }

    }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

   // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
 
    // 
    $name = $form_state->getValue('comany_name');

    $email = $form_state->getValue('admin_mail');

    $admin_uid = simplexity_create_company_admin($email);

    $fields = array(

            'name' =>  $name,
            'active' => 1,
            'created' =>  time(oid),
            'updated' => time(oid),
            'admin_uid' => $admin_uid
        );
        db_insert('companies')
            ->fields($fields)
            ->execute();
        drupal_set_message("succesfully saved");

   }
}