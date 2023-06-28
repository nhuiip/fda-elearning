<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    // public $data;
    // public function __construct()
    // {
    //     public Order $order
    // }
    public function __construct(
        public Member $data,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // 2Eq78n8y$
            from: new Address(
                env('MAIL_FROM_ADDRESS', 'noreply@aseangmpthaifda.com'),
                env('MAIL_FROM_NAME', 'aseangmpthaifda.com')
            ),
            subject: 'FDA: รหัสการเข้าใช้งาน การอบรมออนไลน์หัวข้อ "การอบรมการพัฒนาหลักสูตรฝึกอบรมแก่ภาคีเครือข่ายของกองผลิตภัณฑ์สมุนไพรเพื่อยกระดับมาตรฐานด้านการตรวจประเมินสถานที่ผลิตผลิตภัณฑ์สมุนไพรอย่างมีระบบ”',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'send-password'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
