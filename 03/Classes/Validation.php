<?php

namespace Template\Calsses;

class Validation
{
    public static function validate(array $data): array
    {
        $errors = [];

        if (empty($data['coverImgUrl'])) {
            $errors['coverImgUrl'] = 'Cover image URL is required.';
        } elseif (!filter_var($data['coverImgUrl'], FILTER_VALIDATE_URL)) {
            $errors['coverImgUrl'] = "The URL is invalid.";
        }

        if (empty($data['mainTitle'])) {
            $errors['mainTitle'] = 'Main title is required.';
        }

        if (empty($data['subtitle'])) {
            $errors['subtitle'] = 'Subtitle is required.';
        }

        if (empty($data['somethingAboutYou'])) {
            $errors['somethingAboutYou'] = 'Tell us something about you';
        }

        if (empty($data['phone'])) {
            $errors['phone'] = 'Phone number is required.';
        } else if (!preg_match('/^[0-9]/', $data['phone'])) {
            $errors['phone'] = 'Invalid phone number';
        }

        if (empty($data['location'])) {
            $errors['location'] = 'Location is required.';
        }

        if (empty($data['type']) || !in_array($data['type'], ['services', 'products'])) {
            $errors['type'] = 'Please select a valid option (Services or Products).';
        }

        if (empty($data['url1'])) {
            $errors['url1'] = 'URL 1 is required.';
        } elseif (!filter_var($data['url1'], FILTER_VALIDATE_URL)) {
            $errors['url1'] = 'The URL 1 is invalid.';
        }

        if (empty($data['url2'])) {
            $errors['url2'] = 'URL 2 is required.';
        } elseif (!filter_var($data['url2'], FILTER_VALIDATE_URL)) {
            $errors['url2'] = 'The URL 2 is invalid.';
        }

        if (empty($data['url3'])) {
            $errors['url3'] = 'URL 3 is required.';
        } elseif (!filter_var($data['url3'], FILTER_VALIDATE_URL)) {
            $errors['url3'] = 'The URL 3 is invalid.';
        }

        if (empty($data['description1'])) {
            $errors['description1'] = 'Please provide a description for your product/service.';
        }

        if (empty($data['description2'])) {
            $errors['description2'] = 'Please provide a description for your product/service.';
        }

        if (empty($data['description3'])) {
            $errors['description3'] = 'Please provide a description for your product/service.';
        }

        if (empty($data['companyDescription'])) {
            $errors['companyDescription'] = 'It is important for customers to know more about your business.';
        }

        if (empty($data['linkedin'])) {
            $errors['linkedin'] = 'URL is required.';
        } elseif (!filter_var($data['linkedin'], FILTER_VALIDATE_URL)) {
            $errors['linkedin'] = 'URL is invalid.';
        }

        if (empty($data['facebook'])) {
            $errors['facebook'] = 'URL is required.';
        } elseif (!filter_var($data['facebook'], FILTER_VALIDATE_URL)) {
            $errors['facebook'] = 'URL is invalid.';
        }

        if (empty($data['tweeter'])) {
        $errors['tweeter'] = 'URL is required.';
        } elseif (!filter_var($data['tweeter'], FILTER_VALIDATE_URL)) {
            $errors['tweeter'] = ' URL is invalid.';
        }

        if (empty($data['google'])) {
            $errors['google'] = 'URL is required.';
        } elseif (!filter_var($data['google'], FILTER_VALIDATE_URL)) {
            $errors['google'] = 'URL is invalid.';
        }
        return $errors;
    }
}
