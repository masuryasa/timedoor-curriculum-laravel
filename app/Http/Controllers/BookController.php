<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = [
            ["id" => 1, "image" => 'https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg'],
            ["id" => 2, "image" => 'https://covers.openlibrary.org/b/olid/OL25418275M-M.jpg'],
            ["id" => 3, "image" => 'https://covers.openlibrary.org/b/olid/OL28230579M-M.jpg'],
            ["id" => 4, "image" => 'https://covers.openlibrary.org/b/olid/OL16980586M-M.jpg'],
            ["id" => 5, "image" => 'https://covers.openlibrary.org/b/id/12749873-M.jpg'],
            ["id" => 6, "image" => 'https://covers.openlibrary.org/b/olid/OL26992991M-M.jpg'],
            ["id" => 7, "image" => 'https://covers.openlibrary.org/b/olid/OL22856696M-M.jpg'],
            ["id" => 8, "image" => 'https://covers.openlibrary.org/b/id/13180424-M.jpg'],
            ["id" => 9, "image" => 'https://covers.openlibrary.org/b/olid/OL27918581M-M.jpg'],
            ["id" => 10, "image" => 'https://covers.openlibrary.org/b/id/10389354-M.jpg'],
            ["id" => 11, "image" => 'https://covers.openlibrary.org/b/olid/OL29191495M-M.jpg'],
            ["id" => 12, "image" => 'https://covers.openlibrary.org/b/olid/OL26425330M-M.jpg']
        ];

        return view('index', ['books' => $books]);
    }

    public function show() {
        $details = [
            "id" => 1,
            "isbn" => '1471156265',
            "title" => 'It Ends With Us',
            "author" => 'Colleen Hoover',
            "image" => 'https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg',
            "publisher" => 'Simon & Schuster Ltd',
            "category" => 'Novel',
            "pages" => '384',
            "language" => 'Portuguese',
            "publish_date" => '2016-08-02',
            "subjects" => ['Fiction', 'Romance', 'Contemporary'],
            "desc" => "Lily hasn't always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town where she grew up—she graduated from college, moved to Boston, and started her own business.

    And when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life seems too good to be true. Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. And the way he looks in scrubs certainly doesn’t hurt. Lily can’t get him out of her head. But Ryle’s complete aversion to relationships is disturbing. Even as Lily finds herself becoming the exception to his “no dating” rule, she can’t help but wonder what made him that way in the first place.

    As questions about her new relationship overwhelm her, so do thoughts of Atlas Corrigan—her first love and a link to the past she left behind. He was her kindred spirit, her protector. When Atlas suddenly reappears, everything Lily has built with Ryle is threatened.

    With this bold and deeply personal novel, It Ends With Us is a heart-wrenching story and an unforgettable tale of love that comes at the ultimate price."
            ];

        return view('detail', ['details' => $details]);
    }
}
