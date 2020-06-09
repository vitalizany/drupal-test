<?php

namespace Drupal\dts_main\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'DTS Custom ' Block.
 *
 * @Block(
 *   id = "dts_custom_block",
 *   admin_label = @Translation("DTS Custom"),
 *   category = @Translation("DTS Custom"),
 * )
 */
class DtsCustomBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['heading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Heading'),
      '#default_value' => isset($config['heading']) ? $config['heading'] : '',
      '#maxlength' => 100,
    ];

    $form['copy'] = [
      '#type' => 'text_format',
      '#format'=> 'full_html',
      '#title' => $this->t('Copy'),
      '#default_value' => isset($config['copy']) ? $config['copy'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();

    $this->configuration['heading'] = $values['heading'];
    $this->configuration['copy'] = $values['copy']['value'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $config = $this->getConfiguration();
    $heading = $config['heading'] ?? '';
    $copy = $config['copy'] ?? '';

    return [
      '#theme' => 'dts_custom_block_template',
      '#heading' => $heading,
      '#copy' => $copy,
    ];

  }

}
