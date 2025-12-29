<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        \App\Models\BlogPost::truncate();

        $authorId = \App\Models\User::first()->id ?? 1;

        $posts = [
            [
                'title' => 'How to Build Funder Relationships That Last',
                'slug' => 'how-to-build-funder-relationships-that-last',
                'excerpt' => 'Simple steps for first contact, reporting, and ongoing communication that builds trust and long-term support.',
                'content' => $this->getFunderRelationshipsContent(),
                'category' => 'Stewardship',
                'read_time' => 6,
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now()->subDays(30),
                'author_id' => $authorId,
            ],
            [
                'title' => 'Build a Strong Funder Pipeline',
                'slug' => 'build-a-strong-funder-pipeline',
                'excerpt' => 'Turn scattered prospects into a focused pipeline with clear qualification and engagement steps.',
                'content' => '<p>A strong funder pipeline is essential for sustainable fundraising success.</p>',
                'category' => 'Strategy',
                'read_time' => 4,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(99),
                'author_id' => $authorId,
            ],
            [
                'title' => 'Grant Writing that Wins',
                'slug' => 'grant-writing-that-wins',
                'excerpt' => 'What funders look for: clarity, outcomes, evidence, and why your project truly matters.',
                'content' => '<p>Winning grant applications combine clear writing with compelling evidence of impact.</p>',
                'category' => 'Bid Writing',
                'read_time' => 5,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(110),
                'author_id' => $authorId,
            ],
            [
                'title' => 'Diversify Income, Reduce Risk',
                'slug' => 'diversify-income-reduce-risk',
                'excerpt' => 'Practical ways to add new revenue streams without losing focus on your mission.',
                'content' => '<p>Income diversification is crucial for charity sustainability and resilience.</p>',
                'category' => 'Strategy',
                'read_time' => 6,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(118),
                'author_id' => $authorId,
            ],
            [
                'title' => 'Impact Stories that Convert',
                'slug' => 'impact-stories-that-convert',
                'excerpt' => 'Frame outcomes, evidence, and urgency to inspire action—from bids to newsletters.',
                'content' => '<p>Powerful impact stories connect emotionally while demonstrating tangible outcomes.</p>',
                'category' => 'Communications',
                'read_time' => 5,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(148),
                'author_id' => $authorId,
            ],
            [
                'title' => 'Trust Fundraising Readiness',
                'slug' => 'trust-fundraising-readiness',
                'excerpt' => 'A quick checklist to ensure your case for support is clear, evidenced, and funder-ready.',
                'content' => '<p>Before approaching trusts and foundations, ensure your organization is truly ready.</p>',
                'category' => 'Strategy',
                'read_time' => 4,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(148),
                'author_id' => $authorId,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }

    private function getFunderRelationshipsContent()
    {
        return '<p>Building lasting relationships with funders is one of the most valuable investments a charity can make. It\'s not just about securing a grant—it\'s about creating partnerships that grow over time, leading to repeat funding, larger awards, and genuine advocacy for your mission.</p>

<p>In this guide, we\'ll walk through practical steps for cultivating funder relationships from the very first contact through to long-term stewardship.</p>

<h2>1. Start with Research and Personalization</h2>

<p>Before reaching out to any funder, take time to understand their priorities, values, and recent funding activity. This research allows you to:</p>

<ul>
    <li>Tailor your initial approach to their specific interests</li>
    <li>Demonstrate that you\'ve done your homework</li>
    <li>Identify genuine alignment between their mission and yours</li>
    <li>Reference recent grants or initiatives they\'ve supported</li>
</ul>

<blockquote>
    "The best funder relationships begin with genuine alignment, not just financial need. Show them you understand their mission as well as they understand yours."
</blockquote>

<h2>2. Make a Strong First Impression</h2>

<p>Your initial contact sets the tone for everything that follows. Whether it\'s an email inquiry, phone call, or formal letter of inquiry, make it count:</p>

<ul>
    <li><strong>Be concise</strong> – Respect their time by getting to the point quickly</li>
    <li><strong>Lead with impact</strong> – Start with the problem you solve and the difference you make</li>
    <li><strong>Show alignment</strong> – Explicitly connect your work to their funding priorities</li>
    <li><strong>Be professional</strong> – Proofread carefully and use appropriate tone</li>
</ul>

<h2>3. Deliver Exceptional Grant Applications</h2>

<p>Your proposal is often your second major touchpoint. Make it as strong as possible:</p>

<ul>
    <li>Follow their guidelines precisely</li>
    <li>Tell a compelling story backed by solid evidence</li>
    <li>Be realistic about outcomes and timelines</li>
    <li>Make it easy to say yes by being clear and organized</li>
</ul>

<p>Remember: even if you don\'t get funded this time, a well-crafted proposal builds credibility for future opportunities.</p>

<h2>Final Thoughts</h2>

<p>Building lasting funder relationships is fundamentally about trust, transparency, and mutual respect. The investment you make in relationship-building today will pay dividends for years to come.</p>';
    }
}
