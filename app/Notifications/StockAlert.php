<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockAlert extends Notification
{
    use Queueable;
    public $product_count;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_count)
    {
        $this->product_count = $product_count;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('LOW STOCK ALERT')
                    ->line('There is a new low stock in the database, we have '.$this->product_count.' new product(s) that is low on stock. Click th link below;')
                    ->action('View Product', route('admin.products', ['filter' => 'low_stock']))
                    ->line('Please restock as soon as possible')
                    ->line('Thanks.');
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
            //
        ];
    }
}
