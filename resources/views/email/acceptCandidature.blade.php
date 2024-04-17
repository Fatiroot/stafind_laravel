<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
</head>
<body>
    <h1>Subject: Internship Confirmation - Acceptance</h1>

    @if ($request->user)
        <!-- Check if $request->user is not null -->
        <p>Hello {{ $request->user->fullname }},</p>

        @if ($request->offer && $request->offer->user && $request->offer->user->company)
            <!-- Check if $request->offer, $request->offer->user, $request->offer->user->company are not null -->
            <p>I am writing to confirm my enthusiastic acceptance of your internship offer at {{ $request->offer->user->company->name }}</p>
        @else
            <p>Offer details not available.</p>
        @endif

        @if ($request->offer)
            <!-- Check if $request->offer is not null -->
            <p>for the position of {{ $request->offer->title }} during the specified period.</p>
        @else
            <p>Offer details not available.</p>
        @endif

        <p>I sincerely appreciate this opportunity and look forward to contributing to your team and learning within your company.</p>
        <p>I am confident that this internship will help me develop my skills and gain valuable experience in the field.</p>
        <p>I am available to discuss any additional information or practical details regarding the start of the internship.</p>
        <p>Thank you once again for this opportunity, and I am eager to get started.</p>
        <p>Best regards,</p>
        <p>{{ $request->user->fullname }}</p>
        <p>{{ $request->user->phone }}</p>
        <p>{{ $request->user->address }}</p>
    @else
        <p>User details not available.</p>
    @endif
</body>
</html>
