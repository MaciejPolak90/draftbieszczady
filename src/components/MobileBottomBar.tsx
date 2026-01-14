import { Phone, MessageCircle, MessageSquare } from "lucide-react";

const PHONE_NUMBER = "+48514995497";

export function MobileBottomBar() {
  return (
    <div className="fixed bottom-0 left-0 right-0 z-50 lg:hidden bg-card/95 backdrop-blur-md border-t border-border shadow-elevated">
      <div className="grid grid-cols-3 divide-x divide-border">
        <a
          href={`tel:${PHONE_NUMBER}`}
          className="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
        >
          <Phone className="w-5 h-5 text-primary" />
          <span className="text-xs font-medium">Zadzwoń</span>
        </a>
        <a
          href={`https://wa.me/48514995497`}
          target="_blank"
          rel="noopener noreferrer"
          className="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
        >
          <MessageCircle className="w-5 h-5 text-forest" />
          <span className="text-xs font-medium">WhatsApp</span>
        </a>
        <a
          href={`sms:${PHONE_NUMBER}`}
          className="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
        >
          <MessageSquare className="w-5 h-5 text-honey" />
          <span className="text-xs font-medium">SMS</span>
        </a>
      </div>
    </div>
  );
}
