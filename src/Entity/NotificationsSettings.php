<?php


namespace Drupal\instant_notifications\Entity;


use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines SlackSettings entity.
 *
 * @ingroup slack_settings
 *
 * @ContentEntityType(
 *   id = "slack_settings",
 *   label = @Translation("Notifications Settings"),
 *   base_table = "notifications_settings",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "type",
 *     "uuid" = "uuid",
 *   },
 * )
 */


class NotificationsSettings extends ContentEntityBase implements ContentEntityInterface {

    public function getType() {
        return $this->get('type')->value;
    }


    public function setType($type) {
        $this->get('type')->value = $type;
        return $this;
    }


    public function getWebHookUrl() {
        return $this->get('web_hook_url')->value;
    }


    public function setWebHookUrl($url) {
        $this->get('web_hook_url')->value = $url;
        return $this;
    }



    public function getChannels() {
        return $this->get('channels')->value;
    }


    public function setChannels($channels) {
        $this->get('channels')->value = $$channels;
        return $this;
    }

    // form channel relationship
    public function getFormChannel() {
        return $this->get('form_channel')->value;
    }


    public function setFormChannel($form_channel) {
        $this->get('form_channel')->value = $form_channel;
        return $this;
    }


    /**
     * Determines the schema for slack_settings entity table
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
        // Standard field, used as unique if primary index.
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('The ID of the content entity.'))
            ->setReadOnly(TRUE);

        // Standard field, unique outside of the scope of the current project.
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The UUID of the content entity.'))
            ->setReadOnly(TRUE);

        $fields['type'] = BaseFieldDefinition::create('list_string')
            ->setLabel(t('Type'))
            ->setDescription(t('Type by name eg Slack or discord.'))
            ->setSetting('allowed_values',[
                'slack' => 'Slack',
                'discord' => 'Discord',
            ]);

        $fields['web_hook_url'] = BaseFieldDefinition::create('uri')
            ->setLabel(t('App uri'))
            ->setDescription(t('The webhook uri for your app .'))
            ->setSettings([
                'max_length' => 250,
                'text_processing' => 0,
            ]);

        // relate each form with a channel(s)
        $fields['form_channel'] = BaseFieldDefinition::create('text_long')
            ->setLabel(t('Form id and Channel'))
            ->setDescription(t('Form id and channel(s) to send to.'))
            ->setSettings([
                'max_length' => 1000,
                'text_processing' => 0,
            ]);

        return $fields;
    }

}