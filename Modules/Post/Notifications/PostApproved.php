<?php

namespace Modules\Post\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Post\Models\Post;

class PostApproved extends Notification
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
            'type' => 'success',
            'module' => 'Posts',
            'title' => 'Post Approved',
            'text' => 'Your post "'.$this->post->name.'" has been approved and published.',
            'url_backend' => route('backend.posts.show', $this->post->id, false),
            'url_frontend' => route('frontend.posts.show', $this->post->slug, false),
            'icon' => 'fas fa-check-circle',
        ];
    }
}
