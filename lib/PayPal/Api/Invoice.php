<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;
use PayPal\Validation\UrlValidator;

/**
 * Class Invoice
 *
 * Detailed invoice information.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string number
 * @property string template_id
 * @property string uri
 * @property string status
 * @property \PayPal\Api\MerchantInfo merchant_info
 * @property \PayPal\Api\BillingInfo[] billing_info
 * @property \PayPal\Api\Participant[] cc_info
 * @property \PayPal\Api\ShippingInfo shipping_info
 * @property \PayPal\Api\InvoiceItem[] items
 * @property string invoice_date
 * @property \PayPal\Api\PaymentTerm payment_term
 * @property string reference
 * @property \PayPal\Api\Cost discount
 * @property \PayPal\Api\ShippingCost shipping_cost
 * @property \PayPal\Api\CustomAmount custom
 * @property bool allow_partial_payment
 * @property \PayPal\Api\Currency minimum_amount_due
 * @property bool tax_calculated_after_discount
 * @property bool tax_inclusive
 * @property string terms
 * @property string note
 * @property string merchant_memo
 * @property string logo_url
 * @property \PayPal\Api\Currency total_amount
 * @property \PayPal\Api\PaymentDetail[] payments
 * @property \PayPal\Api\RefundDetail[] refunds
 * @property \PayPal\Api\Metadata metadata
 * @property \PayPal\Api\PaymentSummary paid_amount
 * @property \PayPal\Api\PaymentSummary refunded_amount
 * @property \PayPal\Api\FileAttachment[] attachments
 */
class Invoice extends PayPalResourceModel
{
    /**
     * The unique invoice resource identifier.
     *
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * The unique invoice resource identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Unique number that appears on the invoice. If left blank will be auto-incremented from the last number. 25 characters max.
     *
     * @param string $number
     * 
     * @return $this
     */
    public function setNumber($number): static
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Unique number that appears on the invoice. If left blank will be auto-incremented from the last number. 25 characters max.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * The template ID used for the invoice. Useful for copy functionality.
     *
     * @param string $template_id
     * 
     * @return $this
     */
    public function setTemplateId($template_id): static
    {
        $this->template_id = $template_id;
        return $this;
    }

    /**
     * The template ID used for the invoice. Useful for copy functionality.
     *
     * @return string
     */
    public function getTemplateId()
    {
        return $this->template_id;
    }

    /**
     * URI of the invoice resource.
     *
     * @param string $uri
     * 
     * @return $this
     */
    public function setUri($uri): static
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * URI of the invoice resource.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Status of the invoice.
     * Valid Values: ["DRAFT", "SENT", "PAID", "MARKED_AS_PAID", "CANCELLED", "REFUNDED", "PARTIALLY_REFUNDED", "MARKED_AS_REFUNDED", "UNPAID", "PAYMENT_PENDING"]
     *
     * @param string $status
     * 
     * @return $this
     */
    public function setStatus($status): static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Status of the invoice.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @param \PayPal\Api\MerchantInfo $merchant_info
     * 
     * @return $this
     */
    public function setMerchantInfo($merchant_info): static
    {
        $this->merchant_info = $merchant_info;
        return $this;
    }

    /**
     * Information about the merchant who is sending the invoice.
     *
     * @return \PayPal\Api\MerchantInfo
     */
    public function getMerchantInfo()
    {
        return $this->merchant_info;
    }

    /**
     * The required invoice recipient email address and any optional billing information. One recipient is supported.
     *
     * @param \PayPal\Api\BillingInfo[] $billing_info
     * 
     * @return $this
     */
    public function setBillingInfo($billing_info): static
    {
        $this->billing_info = $billing_info;
        return $this;
    }

    /**
     * The required invoice recipient email address and any optional billing information. One recipient is supported.
     *
     * @return \PayPal\Api\BillingInfo[]
     */
    public function getBillingInfo()
    {
        return $this->billing_info;
    }

    /**
     * Append BillingInfo to the list.
     *
     * @param \PayPal\Api\BillingInfo $billingInfo
     * @return $this
     */
    public function addBillingInfo($billingInfo): static
    {
        if (!$this->getBillingInfo()) {
            return $this->setBillingInfo([$billingInfo]);
        } else {
            return $this->setBillingInfo(
                array_merge($this->getBillingInfo(), [$billingInfo])
            );
        }
    }

    /**
     * Remove BillingInfo from the list.
     *
     * @param \PayPal\Api\BillingInfo $billingInfo
     * @return $this
     */
    public function removeBillingInfo($billingInfo): static
    {
        return $this->setBillingInfo(
            array_diff($this->getBillingInfo(), [$billingInfo])
        );
    }

    /**
     * For invoices sent by email, one or more email addresses to which to send a Cc: copy of the notification. Supports only email addresses under participant.
     *
     * @param \PayPal\Api\Participant[] $cc_info
     * 
     * @return $this
     */
    public function setCcInfo($cc_info): static
    {
        $this->cc_info = $cc_info;
        return $this;
    }

    /**
     * For invoices sent by email, one or more email addresses to which to send a Cc: copy of the notification. Supports only email addresses under participant.
     *
     * @return \PayPal\Api\Participant[]
     */
    public function getCcInfo()
    {
        return $this->cc_info;
    }

    /**
     * Append CcInfo to the list.
     *
     * @param \PayPal\Api\Participant $participant
     * @return $this
     */
    public function addCcInfo($participant): static
    {
        if (!$this->getCcInfo()) {
            return $this->setCcInfo([$participant]);
        } else {
            return $this->setCcInfo(
                array_merge($this->getCcInfo(), [$participant])
            );
        }
    }

    /**
     * Remove CcInfo from the list.
     *
     * @param \PayPal\Api\Participant $participant
     * @return $this
     */
    public function removeCcInfo($participant): static
    {
        return $this->setCcInfo(
            array_diff($this->getCcInfo(), [$participant])
        );
    }

    /**
     * The shipping information for entities to whom items are being shipped.
     *
     * @param \PayPal\Api\ShippingInfo $shipping_info
     * 
     * @return $this
     */
    public function setShippingInfo($shipping_info): static
    {
        $this->shipping_info = $shipping_info;
        return $this;
    }

    /**
     * The shipping information for entities to whom items are being shipped.
     *
     * @return \PayPal\Api\ShippingInfo
     */
    public function getShippingInfo()
    {
        return $this->shipping_info;
    }

    /**
     * The list of items to include in the invoice. Maximum value is 100 items per invoice.
     *
     * @param \PayPal\Api\InvoiceItem[] $items
     * 
     * @return $this
     */
    public function setItems($items): static
    {
        $this->items = $items;
        return $this;
    }

    /**
     * The list of items to include in the invoice. Maximum value is 100 items per invoice.
     *
     * @return \PayPal\Api\InvoiceItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Append Items to the list.
     *
     * @param \PayPal\Api\InvoiceItem $invoiceItem
     * @return $this
     */
    public function addItem($invoiceItem): static
    {
        if (!$this->getItems()) {
            return $this->setItems([$invoiceItem]);
        } else {
            return $this->setItems(
                array_merge($this->getItems(), [$invoiceItem])
            );
        }
    }

    /**
     * Remove Items from the list.
     *
     * @param \PayPal\Api\InvoiceItem $invoiceItem
     * @return $this
     */
    public function removeItem($invoiceItem): static
    {
        return $this->setItems(
            array_diff($this->getItems(), [$invoiceItem])
        );
    }

    /**
     * The date when the invoice was enabled. The date format is *yyyy*-*MM*-*dd* *z* as defined in [Internet Date/Time Format](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $invoice_date
     * 
     * @return $this
     */
    public function setInvoiceDate($invoice_date): static
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }

    /**
     * The date when the invoice was enabled. The date format is *yyyy*-*MM*-*dd* *z* as defined in [Internet Date/Time Format](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Optional. The payment deadline for the invoice. Value is either `term_type` or `due_date` but not both.
     *
     * @param \PayPal\Api\PaymentTerm $payment_term
     * 
     * @return $this
     */
    public function setPaymentTerm($payment_term): static
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * Optional. The payment deadline for the invoice. Value is either `term_type` or `due_date` but not both.
     *
     * @return \PayPal\Api\PaymentTerm
     */
    public function getPaymentTerm()
    {
        return $this->payment_term;
    }

    /**
     * Reference data, such as PO number, to add to the invoice. Maximum length is 60 characters.
     *
     * @param string $reference
     * 
     * @return $this
     */
    public function setReference($reference): static
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Reference data, such as PO number, to add to the invoice. Maximum length is 60 characters.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * The invoice level discount, as a percent or an amount value.
     *
     * @param \PayPal\Api\Cost $discount
     * 
     * @return $this
     */
    public function setDiscount($discount): static
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * The invoice level discount, as a percent or an amount value.
     *
     * @return \PayPal\Api\Cost
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * The shipping cost, as a percent or an amount value.
     *
     * @param \PayPal\Api\ShippingCost $shipping_cost
     * 
     * @return $this
     */
    public function setShippingCost($shipping_cost): static
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * The shipping cost, as a percent or an amount value.
     *
     * @return \PayPal\Api\ShippingCost
     */
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    /**
     * The custom amount to apply on an invoice. If you include a label, the amount cannot be empty.
     *
     * @param \PayPal\Api\CustomAmount $custom
     * 
     * @return $this
     */
    public function setCustom($custom): static
    {
        $this->custom = $custom;
        return $this;
    }

    /**
     * The custom amount to apply on an invoice. If you include a label, the amount cannot be empty.
     *
     * @return \PayPal\Api\CustomAmount
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Indicates whether the invoice allows a partial payment. If set to `false`, invoice must be paid in full. If set to `true`, the invoice allows partial payments. Default is `false`.
     *
     * @param bool $allow_partial_payment
     * 
     * @return $this
     */
    public function setAllowPartialPayment($allow_partial_payment): static
    {
        $this->allow_partial_payment = $allow_partial_payment;
        return $this;
    }

    /**
     * Indicates whether the invoice allows a partial payment. If set to `false`, invoice must be paid in full. If set to `true`, the invoice allows partial payments. Default is `false`.
     *
     * @return bool
     */
    public function getAllowPartialPayment()
    {
        return $this->allow_partial_payment;
    }

    /**
     * If `allow_partial_payment` is set to `true`, the minimum amount allowed for a partial payment.
     *
     * @param \PayPal\Api\Currency $minimum_amount_due
     * 
     * @return $this
     */
    public function setMinimumAmountDue($minimum_amount_due): static
    {
        $this->minimum_amount_due = $minimum_amount_due;
        return $this;
    }

    /**
     * If `allow_partial_payment` is set to `true`, the minimum amount allowed for a partial payment.
     *
     * @return \PayPal\Api\Currency
     */
    public function getMinimumAmountDue()
    {
        return $this->minimum_amount_due;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If set to `false`, the tax is calculated before a discount. If set to `true`, the tax is calculated after a discount. Default is `false`.
     *
     * @param bool $tax_calculated_after_discount
     * 
     * @return $this
     */
    public function setTaxCalculatedAfterDiscount($tax_calculated_after_discount): static
    {
        $this->tax_calculated_after_discount = $tax_calculated_after_discount;
        return $this;
    }

    /**
     * Indicates whether tax is calculated before or after a discount. If set to `false`, the tax is calculated before a discount. If set to `true`, the tax is calculated after a discount. Default is `false`.
     *
     * @return bool
     */
    public function getTaxCalculatedAfterDiscount()
    {
        return $this->tax_calculated_after_discount;
    }

    /**
     * Indicates whether the unit price includes tax. Default is `false`.
     *
     * @param bool $tax_inclusive
     * 
     * @return $this
     */
    public function setTaxInclusive($tax_inclusive): static
    {
        $this->tax_inclusive = $tax_inclusive;
        return $this;
    }

    /**
     * Indicates whether the unit price includes tax. Default is `false`.
     *
     * @return bool
     */
    public function getTaxInclusive()
    {
        return $this->tax_inclusive;
    }

    /**
     * General terms of the invoice. 4000 characters max.
     *
     * @param string $terms
     * 
     * @return $this
     */
    public function setTerms($terms): static
    {
        $this->terms = $terms;
        return $this;
    }

    /**
     * General terms of the invoice. 4000 characters max.
     *
     * @return string
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Note to the payer. 4000 characters max.
     *
     * @param string $note
     * 
     * @return $this
     */
    public function setNote($note): static
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Note to the payer. 4000 characters max.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * A private bookkeeping memo for the merchant. Maximum length is 150 characters.
     *
     * @param string $merchant_memo
     * 
     * @return $this
     */
    public function setMerchantMemo($merchant_memo): static
    {
        $this->merchant_memo = $merchant_memo;
        return $this;
    }

    /**
     * A private bookkeeping memo for the merchant. Maximum length is 150 characters.
     *
     * @return string
     */
    public function getMerchantMemo()
    {
        return $this->merchant_memo;
    }

    /**
     * Full URL of an external image to use as the logo. Maximum length is 4000 characters.
     *
     * @param string $logo_url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setLogoUrl($logo_url): static
    {
        UrlValidator::validate($logo_url, "LogoUrl");
        $this->logo_url = $logo_url;
        return $this;
    }

    /**
     * Full URL of an external image to use as the logo. Maximum length is 4000 characters.
     *
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

    /**
     * The total amount of the invoice.
     *
     * @param \PayPal\Api\Currency $total_amount
     * 
     * @return $this
     */
    public function setTotalAmount($total_amount): static
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * The total amount of the invoice.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * List of payment details for the invoice.
     *
     * @param \PayPal\Api\PaymentDetail[] $payments
     * 
     * @return $this
     */
    public function setPayments($payments): static
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * List of payment details for the invoice.
     *
     * @return \PayPal\Api\PaymentDetail[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Append Payments to the list.
     *
     * @param \PayPal\Api\PaymentDetail $paymentDetail
     * @return $this
     */
    public function addPayment($paymentDetail): static
    {
        if (!$this->getPayments()) {
            return $this->setPayments([$paymentDetail]);
        } else {
            return $this->setPayments(
                array_merge($this->getPayments(), [$paymentDetail])
            );
        }
    }

    /**
     * Remove Payments from the list.
     *
     * @param \PayPal\Api\PaymentDetail $paymentDetail
     * @return $this
     */
    public function removePayment($paymentDetail): static
    {
        return $this->setPayments(
            array_diff($this->getPayments(), [$paymentDetail])
        );
    }

    /**
     * List of refund details for the invoice.
     *
     * @param \PayPal\Api\RefundDetail[] $refunds
     * 
     * @return $this
     */
    public function setRefunds($refunds): static
    {
        $this->refunds = $refunds;
        return $this;
    }

    /**
     * List of refund details for the invoice.
     *
     * @return \PayPal\Api\RefundDetail[]
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * Append Refunds to the list.
     *
     * @param \PayPal\Api\RefundDetail $refundDetail
     * @return $this
     */
    public function addRefund($refundDetail): static
    {
        if (!$this->getRefunds()) {
            return $this->setRefunds([$refundDetail]);
        } else {
            return $this->setRefunds(
                array_merge($this->getRefunds(), [$refundDetail])
            );
        }
    }

    /**
     * Remove Refunds from the list.
     *
     * @param \PayPal\Api\RefundDetail $refundDetail
     * @return $this
     */
    public function removeRefund($refundDetail): static
    {
        return $this->setRefunds(
            array_diff($this->getRefunds(), [$refundDetail])
        );
    }

    /**
     * Audit information for the invoice.
     *
     * @param \PayPal\Api\Metadata $metadata
     * 
     * @return $this
     */
    public function setMetadata($metadata): static
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * Audit information for the invoice.
     *
     * @return \PayPal\Api\Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Any miscellaneous invoice data. Maximum length is 4000 characters.
     * @deprecated Not publicly available
     * @param string $additional_data
     * 
     * @return $this
     */
    public function setAdditionalData($additional_data): static
    {
        $this->additional_data = $additional_data;
        return $this;
    }

    /**
     * Any miscellaneous invoice data. Maximum length is 4000 characters.
     * @deprecated Not publicly available
     * @return string
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    /**
     * Payment summary of the invoice including amount paid through PayPal and other sources.
     *
     * @param \PayPal\Api\PaymentSummary $paid_amount
     * 
     * @return $this
     */
    public function setPaidAmount($paid_amount): static
    {
        $this->paid_amount = $paid_amount;
        return $this;
    }

    /**
     * Payment summary of the invoice including amount paid through PayPal and other sources.
     *
     * @return \PayPal\Api\PaymentSummary
     */
    public function getPaidAmount()
    {
        return $this->paid_amount;
    }

    /**
     * Payment summary of the invoice including amount refunded through PayPal and other sources.
     *
     * @param \PayPal\Api\PaymentSummary $refunded_amount
     * 
     * @return $this
     */
    public function setRefundedAmount($refunded_amount): static
    {
        $this->refunded_amount = $refunded_amount;
        return $this;
    }

    /**
     * Payment summary of the invoice including amount refunded through PayPal and other sources.
     *
     * @return \PayPal\Api\PaymentSummary
     */
    public function getRefundedAmount()
    {
        return $this->refunded_amount;
    }

    /**
     * List of files attached to the invoice.
     *
     * @param \PayPal\Api\FileAttachment[] $attachments
     * 
     * @return $this
     */
    public function setAttachments($attachments): static
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * List of files attached to the invoice.
     *
     * @return \PayPal\Api\FileAttachment[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Append Attachments to the list.
     *
     * @param \PayPal\Api\FileAttachment $fileAttachment
     * @return $this
     */
    public function addAttachment($fileAttachment): static
    {
        if (!$this->getAttachments()) {
            return $this->setAttachments([$fileAttachment]);
        } else {
            return $this->setAttachments(
                array_merge($this->getAttachments(), [$fileAttachment])
            );
        }
    }

    /**
     * Remove Attachments from the list.
     *
     * @param \PayPal\Api\FileAttachment $fileAttachment
     * @return $this
     */
    public function removeAttachment($fileAttachment): static
    {
        return $this->setAttachments(
            array_diff($this->getAttachments(), [$fileAttachment])
        );
    }

    /**
     * Creates an invoice. Include invoice details including merchant information in the request.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function create($apiContext = null, $restCall = null): static
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/invoicing/invoices",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Searches for an invoice or invoices. Include a search object that specifies your search criteria in the request.
     *
     * @param Search $search
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function search($search, $apiContext = null, $restCall = null): \PayPal\Api\InvoiceSearchResponse
    {
        ArgumentValidator::validate($search, 'search');
        $payLoad = $search->toJSON();
        $json = self::executeCall(
            "/v1/invoicing/search",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new InvoiceSearchResponse();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Sends an invoice, by ID, to a recipient. Optionally, set the `notify_merchant` query parameter to send the merchant an invoice update notification. By default, `notify_merchant` is `true`.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function send($apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/send', $this->getId()),
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Sends a reminder about a specific invoice, by ID, to a recipient. Include a notification object that defines the reminder subject and other details in the JSON request body.
     *
     * @param Notification $notification
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function remind($notification, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($notification, 'notification');
        $payLoad = $notification->toJSON();
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/remind', $this->getId()),
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Cancels an invoice, by ID.
     *
     * @param CancelNotification $cancelNotification
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function cancel($cancelNotification, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($cancelNotification, 'cancelNotification');
        $payLoad = $cancelNotification->toJSON();
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/cancel', $this->getId()),
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Marks the status of a specified invoice, by ID, as paid. Include a payment detail object that defines the payment method and other details in the JSON request body.
     *
     * @param PaymentDetail $paymentDetail
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function recordPayment($paymentDetail, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($paymentDetail, 'paymentDetail');
        $payLoad = $paymentDetail->toJSON();
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/record-payment', $this->getId()),
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Marks the status of a specified invoice, by ID, as refunded. Include a refund detail object that defines the refund type and other details in the JSON request body.
     *
     * @param RefundDetail $refundDetail
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function recordRefund($refundDetail, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($refundDetail, 'refundDetail');
        $payLoad = $refundDetail->toJSON();
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/record-refund', $this->getId()),
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Gets the details for a specified invoice, by ID.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function get(string $invoiceId, $apiContext = null, $restCall = null): \PayPal\Api\Invoice
    {
        ArgumentValidator::validate($invoiceId, 'invoiceId');
        $payLoad = "";
        $json = self::executeCall(
            '/v1/invoicing/invoices/' . $invoiceId,
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Invoice();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Lists some or all merchant invoices. Filters the response by any specified optional query string parameters.
     *
     * @param array $params
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function getAll($params = [], $apiContext = null, $restCall = null): \PayPal\Api\InvoiceSearchResponse
    {
        ArgumentValidator::validate($params, 'params');

        $allowedParams = [
            'page' => 1,
            'page_size' => 1,
            'total_count_required' => 1
        ];

        $payLoad = "";
        $json = self::executeCall(
            "/v1/invoicing/invoices/?" . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new InvoiceSearchResponse();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Fully updates an invoice by passing the invoice ID to the request URI. In addition, pass a complete invoice object in the request JSON. Partial updates are not supported.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function update($apiContext = null, $restCall = null): static
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            '/v1/invoicing/invoices/' . $this->getId(),
            "PUT",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Delete a particular invoice by passing the invoice ID to the request URI.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function delete($apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        self::executeCall(
            '/v1/invoicing/invoices/' . $this->getId(),
            "DELETE",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Delete external payment.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function deleteExternalPayment($transactionId, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($transactionId, "TransactionId");
        $payLoad = "";
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/payment-records/%s', $this->getId(), $transactionId),
            "DELETE",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Delete external refund.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public function deleteExternalRefund($transactionId, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($transactionId, "TransactionId");
        $payLoad = "";
        self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/refund-records/%s', $this->getId(), $transactionId),
            "DELETE",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Generate a QR code for an invoice by passing the invoice ID to the request URI. The request generates a QR code that is 500 pixels in width and height. You can change the dimensions of the returned code by specifying optional query parameters.
     *
     * @param array $params
     * @param string $invoiceId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function qrCode($invoiceId, $params = [], $apiContext = null, $restCall = null): \PayPal\Api\Image
    {
        ArgumentValidator::validate($invoiceId, 'invoiceId');
        ArgumentValidator::validate($params, 'params');

        $allowedParams = [
            'width' => 1,
            'height' => 1,
            'action' => 1
        ];

        $payLoad = "";
        $json = self::executeCall(
            sprintf('/v1/invoicing/invoices/%s/qr-code?', $invoiceId) . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Image();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Generates the successive invoice number.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     */
    public static function generateNumber($apiContext = null, $restCall = null): \PayPal\Api\InvoiceNumber
    {
        $payLoad = "";
        $json = self::executeCall(
            "/v1/invoicing/invoices/next-invoice-number",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new InvoiceNumber();
        $ret->fromJson($json);
        return $ret;
    }

}
