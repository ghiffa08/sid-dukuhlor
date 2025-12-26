<?php

namespace Modules\Post\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Post\Models\Post;

class PostPendingApproval extends Notification
{
    use Queueable;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'info',
            'module' => 'Posts',
            'post_id' => $this->post->id,
            'title' => 'Post Pending Approval',
            'text' => 'New post by '.$this->post->createdByAlias.' is pending approval: '.$this->post->name,
            'url_backend' => route('backend.posts.show', $this->post->id, false),
            'url_frontend' => '',
            'icon' => 'fas fa-file-alt',
            'action_url' => route('backend.posts.approve', $this->post->id, false),
        ];
    }
}
