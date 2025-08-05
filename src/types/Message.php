<?php

declare(strict_types=1);

namespace Telegram\types;

use Telegram\types\messageOrigin\MessageOrigin;
use Telegram\types\messageOrigin\MessageOriginChannel;
use Telegram\types\messageOrigin\MessageOriginChat;
use Telegram\types\messageOrigin\MessageOriginHiddenUser;
use Telegram\types\messageOrigin\MessageOriginTypes;
use Telegram\types\messageOrigin\MessageOriginUser;

readonly class Message {
    private int $messageId;
    private ?int $messageThreadId;
    private ?User $from;
    private ?Chat $senderChat;
    private ?int $senderBoostCount;
    private ?User $senderBusinessBot;
    private int $date;
    private ?string $businessConnectionId;
    private ?Chat $chat;
    private ?MessageOrigin $forwardOrigin;
    private ?true $isTopicMessage;
    private ?true $isAutomaticForward;
    private ?Message $replyToMessage;
    private ?User $viaBot;
    private ?int $editDate;
    private ?true $hasProtectedContent;
    private ?true $isFromOffline;
    private ?string $mediaGroupId;
    private ?string $authorSignature;
    private ?string $text;
    private ?string $effectId;
    private ?Animation $animation;
    private ?Audio $audio;
    private ?string $caption;
    private ?true $showCaptionAboveMedia;
    private ?true $hasMediaSpoiler;
    private ?User $leftChatMember;
    private ?string $newChatTitle;
    private ?true $deleteChatPhoto;
    private ?true $groupChatCreated;
    private ?true $supergroupChatCreated;
    private ?true $channelChatCreated;
    private ?int $migrateToChatId;
    private ?int $migrateFromChatId;
    private ?string $connectedWebsite;

    public function __construct(array $input){
        $this->messageId = $input["message_id"];
        $this->messageThreadId = $input["message_thread_id"] ?? null;
        $this->from = isset($input["from"]) ? User::create($input["from"]) : null;
        $this->senderChat = isset($input["sender_chat"]) ? Chat::create($input["sender_chat"]) : null;
        $this->senderBoostCount = $input["sender_boost_count"] ?? null;
        $this->senderBusinessBot = isset($input["sender_business_bot"]) ? User::create($input["sender_business_bot"]) : null;
        $this->date = $input["date"];
        $this->businessConnectionId = $input["business_connection_id"] ?? null;
        $this->chat = isset($input["chat"]) ? Chat::create($input["chat"]) : null;
        $this->forwardOrigin = match ($inputMessageOrigin = $input["message_origin"] ?? null) {
            MessageOriginTypes::USER => MessageOriginUser::create($inputMessageOrigin),
            MessageOriginTypes::HIDDEN_USER => MessageOriginHiddenUser::create($inputMessageOrigin),
            MessageOriginTypes::CHAT => MessageOriginChat::create($inputMessageOrigin),
            MessageOriginTypes::CHANNEL => MessageOriginChannel::create($inputMessageOrigin),
            default => null
        };
        $this->isTopicMessage = $input["is_topic_message"] ?? null;
        $this->isAutomaticForward = $input["is_automatic_forward"] ?? null;
        $this->replyToMessage = isset($input["reply_to_message"]) ? new Message($input["reply_to_message"]) : null;
        //TODO: external_reply
        //TODO: quote
        //TODO: reply_to_story
        $this->viaBot = isset($input["via_bot"]) ? User::create($input["via_bot"]) : null;
        $this->editDate = $input["edit_date"] ?? null;
        $this->hasProtectedContent = $input["has_protected_content"] ?? null;
        $this->isFromOffline = $input["is_from_offline"] ?? null;
        $this->mediaGroupId = $input["media_group_id"] ?? null;
        $this->authorSignature = $input["author_signature"] ?? null;
        $this->text = $input["text"] ?? null;
        //TODO: entities
        //TODO: link_preview_options
        $this->effectId = $input["effect_id"] ?? null;
        $this->animation = isset($input["animation"]) ? Animation::create($input["animation"]) : null;
        $this->audio = isset($input["audio"]) ? Audio::create($input["audio"]) : null;
        //TODO: document
        //TODO: paid_media
        //TODO: photo
        //TODO: sticker
        //TODO: story
        //TODO: video
        //TODO: video_note
        //TODO: voice
        $this->caption = $input["caption"] ?? null;
        //TODO: caption_entities
        $this->showCaptionAboveMedia = $input["show_caption_above_media"] ?? null;
        $this->hasMediaSpoiler = $input["has_media_spoiler"] ?? null;
        //TODO: contact
        //TODO: dice
        //TODO: game
        //TODO: poll
        //TODO: venue
        //TODO: location
        //TODO: new_chat_members
        $this->leftChatMember = isset($input["left_chat_member"]) ? User::create($input["left_chat_member"]) : null;
        $this->newChatTitle = $input["new_chat_title"] ?? null;
        //TODO: new_chat_photo
        $this->deleteChatPhoto = $input["delete_chat_photo"] ?? null;
        $this->groupChatCreated = $input["group_chat_created"] ?? null;
        $this->supergroupChatCreated = $input["supergroup_chat_created"] ?? null;
        $this->channelChatCreated = $input["channel_chat_created"] ?? null;
        //TODO: message_auto_delete_timer_changed
        $this->migrateToChatId = $input["migrate_to_chat_id"] ?? null;
        $this->migrateFromChatId = $input["migrate_from_chat_id"] ?? null;
        //TODO: pinned_message
        //TODO: invoice
        //TODO: successful_payment
        //TODO: refunded_payment
        //TODO: users_shared
        //TODO: chat_shared
        $this->connectedWebsite = $input["connected_website"] ?? null;
        //TODO: write_access_allowed
        //TODO: passport_data
        //TODO: proximity_alert_triggered
        //TODO: boost_added
        //TODO: chat_background_set
        //TODO: forum_topic_created
        //TODO: forum_topic_edited
        //TODO: forum_topic_closed
        //TODO: forum_topic_reopened
        //TODO: general_forum_topic_hidden
        //TODO: general_forum_topic_unhidden
        //TODO: giveaway_created
        //TODO: giveaway
        //TODO: giveaway_winners
        //TODO: giveaway_completed
        //TODO: video_chat_scheduled
        //TODO: video_chat_started
        //TODO: video_chat_ended
        //TODO: video_chat_participants_invited
        //TODO: web_app_data
        //TODO: reply_markup
    }

    public function getMessageId() : int {
        return $this->messageId;
    }

    public function getMessageThreadId() : ?int {
        return $this->messageThreadId;
    }

    public function getFrom() : ?User {
        return $this->from;
    }

    public function getSenderChat() : ?Chat {
        return $this->senderChat;
    }

    public function getSenderBoostCount() : ?int {
        return $this->senderBoostCount;
    }

    public function getSenderBusinessBot() : ?User {
        return $this->senderBusinessBot;
    }

    public function getDate() : int {
        return $this->date;
    }

    public function getBusinessConnectionId() : ?string {
        return $this->businessConnectionId;
    }

    public function getChat() : ?Chat {
        return $this->chat;
    }

    public function getForwardOrigin() : ?MessageOrigin {
        return $this->forwardOrigin;
    }

    public function isTopicMessage() : ?true {
        return $this->isTopicMessage;
    }

    public function isAutomaticForward() : ?true {
        return $this->isAutomaticForward;
    }
    
    public function getReplyToMessage() : ?Message {
        return $this->replyToMessage;
    }

    public function getViaBot() : ?User {
        return $this->viaBot;
    }

    public function getEditDate() : ?int {
        return $this->editDate;
    }

    public function hasProtectedContent() : ?true {
        return $this->hasProtectedContent;
    }

    public function isFromOffline() : ?true {
        return $this->isFromOffline;
    }

    public function getMediaGroupId() : ?string {
        return $this->mediaGroupId;
    }

    public function getAuthorSignature() : ?string {
        return $this->authorSignature;
    }

    public function getText() : ?string {
        return $this->text;
    }

    public function getEffectId() : ?string {
        return $this->effectId;
    }

    public function getAnimation() : ?Animation {
        return $this->animation;
    }

    public function getAudio() : ?Audio {
        return $this->audio;
    }

    public function getCaption() : ?string {
        return $this->caption;
    }

    public function isShowCaptionAboveMedia() : ?true {
        return $this->showCaptionAboveMedia;
    }

    public function hasMediaSpoiler() : ?true {
        return $this->hasMediaSpoiler;
    }

    public function getLeftChatMember() : ?User {
        return $this->leftChatMember;
    }

    public function getNewChatTitle() : ?string {
        return $this->newChatTitle;
    }

    public function isDeleteChatPhoto() : ?true {
        return $this->deleteChatPhoto;
    }

    public function isGroupChatCreated() : ?true {
        return $this->groupChatCreated;
    }

    public function isSupergroupChatCreated() : ?true {
        return $this->supergroupChatCreated;
    }

    public function isChannelChatCreated() : ?true {
        return $this->channelChatCreated;
    }

    public function getMigrateToChatId() : ?int {
        return $this->migrateToChatId;
    }

    public function getMigrateFromChatId() : ?int {
        return $this->migrateFromChatId;
    }

    public function getConnectedWebsite() : ?int {
        return $this->connectedWebsite;
    }
}