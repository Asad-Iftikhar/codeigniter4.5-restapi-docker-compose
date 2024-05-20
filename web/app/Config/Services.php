<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    public static function getSecretKey()
    {
        return getenv('JWT_SECRET_KEY');
    }

    public static function getPrivateKey()
    {
        return <<<EOD
        -----BEGIN PRIVATE KEY-----
        MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCuFpQgC/Vq/Ul3
        EU9r29y5y+Pmg0jfgrF8PuOPbkPUr3ezwuxtlHrYvwGeZpSwbezG6fI5xumt1YLD
        y/CkbRfNfxNuysHztPy81NMY3T72IXxXyy8LrIfEmQyKifgjMjbhqScjVqlP8sag
        ZHN8epIhe4jdfvkCKVT/uC9LTwYG/SckoMnHRDyPm5QdM6bHM0ilCsSPR6dD1yPG
        j8Z7vVNl53EINKy1us10jcsFZB9L1cssADJ+mJXX8sNP/+326bWA1CrrsCdYkPCv
        VKvgsup9WXM4SvDehtszvYR2Dw946/6cVghZb4zIXwCnz8Vr1AxOsC7IjRi7pano
        pEs9vudJAgMBAAECggEADvPXgy0jxi29KqHs/Wmj+r1ddMYf8zqpfe904jPpVZJA
        qMr8Pak8J/O38uACs2itpqQfbwD7vzeQhLq2j5jjK35Xr/NwVztbXei1vPP73W4g
        3PWRs+H8w1EV96xECNneRuGdf/aIklpa3xnhpXZtqLyQk929C4d7Sn+KaGCANwdQ
        8+c8NJWDIGDVQdgqq1101gvjYdg1GZQXYVk2JWObfrbivyKbx929T7VRieM4Ic+2
        IeYewPmjsAfZ/KFzUOOyG1YVtkQEOsdBbHXy5HQnr8z2T8uMHL9ZAo7fvOHCMfDv
        VMohtT6X6biUPQ8t6WoRZ3LaS3CjHSqgeD7UahsakQKBgQDnRlFH9cqNRpCAwLRz
        XPFGpEHs7xaAlwneVjWhO/5Q3cW0NAv+OC5ufHlsvbi4JiU4ABA3OhV2buSEQT4I
        3IRj6ZlLNRLnEiyZHuwYH0ET2T8VlxgtaSM4vZhQKqqafiiyqGqoZUZ90gxS6DxZ
        717MAu7FSyCSMRqbwAXV7YZKRQKBgQDAsySGVDG0eZIqBj/2RHWSVG66tqG2q6f7
        A/6qSuZPDtKVZc+u+BcHFW4h1E0ImHCWvJgKlvKD+pvSKNei3t0Qgli0rKqwtTOg
        BlFplBmmElwIL6TrYCEzf2H+9YGDrs6zENKoP3WjNWzUsdKAD6DT/Mrtxj0Q5YM0
        Ou7s+I9bNQKBgEhgy0M3+uHnuYVxyYdpCOFQuokJ8gLgQehhFnuVKOvp29ufhjlT
        H8TYE7AiV9LZrUAvVOPTu6/K2J1DRcTELnKOQrk0rOu/1lE9SinqbhVmIcYB+UEM
        7EbvnuFH2QhsfxQafPaia0MpH046+9gxf3tdV5hLALB/yZIAsFLY+PP5AoGAT1y4
        SzZ7rhdvki02xIcXYOezHuS+n0v9B81yYdItHhw9sFfY+/ejDEDQNdCI1WRq4jnT
        6HCYerCI4jn97U8Z/oWgYPDH77UBCQPxHaloEtR24Mw2gNX7dokc4/NantAswuTH
        zZEtMsV7B/IgfqtxEj2HmfvOBJpxud4XrrMD340CgYBPnBfPvAPSyy33hCQwDCzj
        3Ryqy42A607hw1NL9sKbnD46xMdaSMakEpFeChbTRONWQ2XYojnfHGmt197O/CvW
        SMYoH2owgKYiOUItQ3wuDjOnBoCkAMyry3WNZX6v0Yb4/esxWS5aWDGUGQbEdYAq
        ZI8bmq13il3mXVXWz43jUQ==
        -----END PRIVATE KEY-----
        EOD;
        return $privateKey;
    }

    public static function getPublicKey()
    {
        return <<<EOD
        -----BEGIN PUBLIC KEY-----
        MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArhaUIAv1av1JdxFPa9vc
        ucvj5oNI34KxfD7jj25D1K93s8LsbZR62L8BnmaUsG3sxunyOcbprdWCw8vwpG0X
        zX8TbsrB87T8vNTTGN0+9iF8V8svC6yHxJkMion4IzI24aknI1apT/LGoGRzfHqS
        IXuI3X75AilU/7gvS08GBv0nJKDJx0Q8j5uUHTOmxzNIpQrEj0enQ9cjxo/Ge71T
        ZedxCDSstbrNdI3LBWQfS9XLLAAyfpiV1/LDT//t9um1gNQq67AnWJDwr1Sr4LLq
        fVlzOErw3obbM72Edg8PeOv+nFYIWW+MyF8Ap8/Fa9QMTrAuyI0Yu6Wp6KRLPb7n
        SQIDAQAB
        -----END PUBLIC KEY-----
        EOD;
    }
}
